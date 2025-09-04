@extends('base')
@section('title', 'Decision Matrix')
@section('content')

@push('styles_result')

   <style nonce="{{ $nonce }}">

     body {
            font-family: 'Inter', sans-serif;
        }
        /* Style for the gauge arcs */
        .gauge-arc {
            transition: opacity 0.3s ease-in-out;
            opacity: 0.4; /* Make non-active arcs semi-transparent */
        }
        /* Set permanent colors for each arc based on Bootstrap's theme colors */
        #arc-dont-buy { fill: #dc3545; } /* Red */
        #arc-reconsider { fill: #ffc107; } /* Amber */
        #arc-buy { fill: #22c55e; } /* Green */
        #arc-strong-buy { fill: #198754; } /* Deep Green */

        /* Style for the active arc */
        .gauge-arc.active {
            opacity: 1; /* Make the active arc fully opaque */
        }
        
        /* Style for the text labels along the arc */
        .arc-label-text {
            font-size: 7px; /* Reduced font size for longer labels */
            font-weight: 500;
            fill: #6c757d; /* Lighter gray color for labels */
            text-anchor: middle;
            letter-spacing: 0.05em;
            transition: all 0.3s ease-in-out;
        }
        .arc-label-text.active {
             fill: #212529; /* Darker color for the active label */
             font-weight: 700; /* Make active label bold */
        }
        /* Style for the number ticks */
        .tick-label {
            font-size: 14px;
            fill: #6c757d;
            text-anchor: middle;
        }
         /* Style for the smaller dot ticks */
        .tick-dot {
            fill: #dee2e6;
        }
        /* Smooth transition for the needle rotation */
        #gauge-needle {
            transition: transform 0.7s cubic-bezier(0.68, -0.6, 0.32, 1.6);
        }


    </style>


        <!-- SVG Container for the gauge -->
            <svg id="gauge" viewBox="0 0 400 220" class="w-100">
                <!-- Group for all gauge components -->
                <g transform="translate(200, 200)">
                    
                    <!-- Arcs for each section -->
                    
                          <g id="gauge-arcs">
                        <path id="arc-dont-buy" class="gauge-arc" data-min="0" data-max="50"></path>
                        <path id="arc-reconsider" class="gauge-arc" data-min="50" data-max="70"></path>
                        <path id="arc-buy" class="gauge-arc" data-min="70" data-max="85"></path>
                        <path id="arc-strong-buy" class="gauge-arc" data-min="85" data-max="100"></path>
                    </g>
                    <!-- Invisible paths for curved text labels -->
                    <defs>
                        <path id="label-path-dont-buy" fill="none" d="M -160,0 A 160,160 0 0 1 -113.1, -113.1"></path>
                        <path id="label-path-reconsider" fill="none" d="M -41.4, -154.5 A 160,160 0 0 1 51.4, -154.5"></path>
                        <path id="label-path-buy" fill="none" d="M 0,-160 A 160,160 0 0 1 113.1,-113.1"></path>
                        <path id="label-path-strong-buy" fill="none"  d="M 113.1,-113.1 A 160,160 0 0 1 160,0"></path>
                    </defs>

                   <!-- Text labels that follow the arcs -->
                    <g id="gauge-labels">
                        <text class="arc-label-text" dominant-baseline="middle">
                            <textPath xlink:href="#label-path-dont-buy" startOffset="50%">DON'T BUY</textPath>
                        </text>
                        <text class="arc-label-text" dominant-baseline="middle">
                            <textPath xlink:href="#label-path-reconsider" startOffset="50%">RECONSIDER</textPath>
                        </text>
                         <text class="arc-label-text" dominant-baseline="middle">
                            <textPath xlink:href="#label-path-buy" startOffset="50%">BUY</textPath>
                        </text>
                        <text class="arc-label-text" dominant-baseline="middle">
                            <textPath xlink:href="#label-path-strong-buy" startOffset="50%">STRONG BUY</textPath>
                        </text>
                    </g>

                    <!-- Ticks and Numbers -->
                    <g id="gauge-ticks"></g>

                    <!-- Needle -->
                    <g id="gauge-needle">
                        <!-- The main pointer of the needle -->
                        <path d="M 0 -115 L 8 0 L -8 0 Z" fill="#212529" />
                        <!-- The circular pivot point of the needle -->
                        <circle cx="0" cy="0" r="12" fill="#212529" />
                    </g>
                </g>
            </svg>
            
            <!-- Central value display, overlaid on top of the SVG -->
            <div class="position-absolute top-0 start-0 end-0 bottom-0 d-flex align-items-center justify-content-center">
                 <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 8rem; height: 8rem; margin-top: 55%;">
                    <span id="gauge-value" class="display-4 fw-bold text-dark"></span>
                </div>
            </div>


<script>
        document.addEventListener('DOMContentLoaded', () => {
            // Gauge elements
            const needle = document.getElementById('gauge-needle');
            const valueText = document.getElementById('gauge-value');
            const arcs = document.querySelectorAll('.gauge-arc');
            const labels = document.querySelectorAll('.arc-label-text');
            const ticksContainer = document.getElementById('gauge-ticks');
            
            const GAUGE_RADIUS = 135;
            const GAUGE_START_ANGLE = -90;
            const GAUGE_END_ANGLE = 90;
            const GAUGE_WIDTH = 50;

            // --- Helper functions to draw SVG arcs ---
            function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
                const angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;
                return {
                    x: centerX + (radius * Math.cos(angleInRadians)),
                    y: centerY + (radius * Math.sin(angleInRadians))
                };
            }

            function describeDonutSegment(x, y, outerRadius, innerRadius, startAngle, endAngle) {
                const startOuter = polarToCartesian(x, y, outerRadius, endAngle);
                const endOuter = polarToCartesian(x, y, outerRadius, startAngle);
                const startInner = polarToCartesian(x, y, innerRadius, endAngle);
                const endInner = polarToCartesian(x, y, innerRadius, startAngle);
                const largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";
                const d = [
                    "M", startOuter.x, startOuter.y,
                    "A", outerRadius, outerRadius, 0, largeArcFlag, 0, endOuter.x, endOuter.y,
                    "L", endInner.x, endInner.y,
                    "A", innerRadius, innerRadius, 0, largeArcFlag, 1, startInner.x, startInner.y,
                    "Z"
                ].join(" ");
                return d;
            }

            const mapValueToAngle = (value) => GAUGE_START_ANGLE + (value / 100) * (GAUGE_END_ANGLE - GAUGE_START_ANGLE);

            // --- Drawing functions ---
            function drawArcs() {
                arcs.forEach(arc => {
                    const min = parseInt(arc.dataset.min);
                    const max = parseInt(arc.dataset.max);
                    const startAngle = mapValueToAngle(min);
                    const endAngle = mapValueToAngle(max);
                    const pathData = describeDonutSegment(0, 0, GAUGE_RADIUS, GAUGE_RADIUS - GAUGE_WIDTH, startAngle, endAngle);
                    arc.setAttribute('d', pathData);
                });
            }

            function drawTicks() {
                const tickRadius = GAUGE_RADIUS - GAUGE_WIDTH - 5;
                let ticksHtml = '';

                for (let i = 0; i <= 20; i++) {
                     const angle = GAUGE_START_ANGLE + (i / 20) * (GAUGE_END_ANGLE - GAUGE_START_ANGLE);
                     const pos = polarToCartesian(0, 0, tickRadius, angle);
                     ticksHtml += `<circle cx="${pos.x}" cy="${pos.y}" r="2" class="tick-dot" />`;
                }

                for (let i = 0; i <= 4; i++) {
                    const value = i * 25;
                    const angle = mapValueToAngle(value);
                    const pos = polarToCartesian(0, 0, tickRadius - 10, angle);
                    ticksHtml += `<text x="${pos.x}" y="${pos.y}" dy="5" class="tick-label">${value}</text>`;
                }
                ticksContainer.innerHTML = ticksHtml;
            }

            function updateGauge(value) {
                const angle = mapValueToAngle(value);
                needle.setAttribute('transform', `rotate(${angle})`);
                valueText.textContent = Math.round(value);

                let activeLabelIndex = -1;
                arcs.forEach((arc, index) => {
                    const min = parseInt(arc.dataset.min);
                    const max = parseInt(arc.dataset.max);
                    
                    if (value >= min && (value < max || (value == 100 && max == 100))) {
                        arc.classList.add('active');
                        activeLabelIndex = index;
                    } else {
                        arc.classList.remove('active');
                    }
                });

                labels.forEach((label, index) => {
                    if(index === activeLabelIndex) {
                        label.classList.add('active');
                    } else {
                        label.classList.remove('active');
                    }
                });
            }

            // --- Initialization ---
            //  VVV --- THIS IS WHERE YOU PLUG IN YOUR SCORE --- VVV
            // const score = 78; 
              // 1. Safely retrieve and parse sessionStorage data
                // 1. Safely retrieve and parse sessionStorage data
  const savedScoreData = JSON.parse(sessionStorage.getItem('scoreData')) || {};

  if (!savedScoreData || Object.keys(savedScoreData).length === 0) {
    throw new Error('No score data found in session storage');
  }

  // 2. Set defaults for missing data
  const score = parseInt(savedScoreData.score, 10);
  // const score = 43;
            // Example: get this value from your database or session
            //  ^^^ --------------------------------------------- ^^^

            drawArcs();
            drawTicks();
            updateGauge(score);
        });
    </script>


@endsection 