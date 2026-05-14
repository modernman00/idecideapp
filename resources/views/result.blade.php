@extends('base')
@section('title', 'Decision Matrix')
@section('content')

    @push('styles_result')

        <style nonce="{{ $nonce }}">
        :root {
            --glass-bg: rgba(255, 255, 255, 0.8);
            --glass-border: #DADCE0;
            --glass-blur: blur(24px);
            --accent-primary: #1B5E20;
            --accent-secondary: #4CAF50;
            --text-main: #202124;
            --text-muted: #5F6368;
            --surface-card: #FFFFFF;
        }

        [data-theme="dark"] {
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --surface-card: #1e293b;
        }

        body {
            background: var(--background-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
        }

            .result-container {
                max-width: 900px;
                width: 95%;
                margin: 2rem auto;
                animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .glass-card {
                background: var(--glass-bg);
                backdrop-filter: var(--glass-blur);
                -webkit-backdrop-filter: var(--glass-blur);
                border: 1px solid var(--glass-border);
                border-radius: 24px;
                padding: 3rem;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
                color: var(--text-main);
            }

            .header-section {
                text-align: center;
                margin-bottom: 3rem;
            }

            .header-section h1 {
                font-family: 'Outfit', sans-serif;
                font-weight: 800;
                font-size: 2.5rem;
                margin-bottom: 0.5rem;
                background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .score-visualization {
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-bottom: 3rem;
            }

            .gauge-container {
                position: relative;
                width: 200px;
                height: 200px;
                margin-bottom: 1rem;
            }

            .gauge-svg {
                transform: rotate(-90deg);
                width: 100%;
                height: 100%;
            }

            .gauge-background {
                fill: none;
                stroke: rgba(0, 0, 0, 0.05);
                stroke-width: 12;
            }

            [data-theme="dark"] .gauge-background {
                stroke: rgba(255, 255, 255, 0.05);
            }

            .gauge-progress {
                fill: none;
                stroke: var(--accent-primary);
                stroke-width: 12;
                stroke-linecap: round;
                stroke-dasharray: 565.48;
                /* 2 * PI * 90 */
                stroke-dashoffset: 565.48;
                transition: stroke-dashoffset 1.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            .score-text {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 3rem;
                font-weight: 800;
                font-family: 'Outfit', sans-serif;
                color: var(--accent-primary);
            }

            .smiley-scale {
                display: flex;
                gap: 0.75rem;
                margin-bottom: 1.5rem;
                background: rgba(0, 0, 0, 0.03);
                padding: 0.5rem 1rem;
                border-radius: 50px;
            }

            [data-theme="dark"] .smiley-scale {
                background: rgba(255, 255, 255, 0.03);
            }

            .smiley {
                font-size: 1.25rem;
                opacity: 0.4;
                transition: all 0.3s ease;
            }

            .smiley.active {
                opacity: 1;
                transform: scale(1.3);
            }

            .decision-section {
                background: rgba(255, 255, 255, 0.5);
                border-radius: 16px;
                padding: 1.5rem;
                margin-bottom: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            [data-theme="dark"] .decision-section {
                background: rgba(15, 23, 42, 0.3);
            }

            .decision-label {
                text-transform: uppercase;
                letter-spacing: 0.05em;
                font-weight: 700;
                font-size: 0.75rem;
                color: var(--text-muted);
                margin-bottom: 0.5rem;
            }

            .decision-text {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--accent-primary);
            }

            .advice-card {
                background: rgba(255, 255, 255, 0.8);
                border-radius: 20px;
                padding: 2rem;
                margin-bottom: 2rem;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            }

            [data-theme="dark"] .advice-card {
                background: rgba(30, 41, 59, 0.5);
            }

            .advice-header {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 1rem;
                font-weight: 700;
                font-size: 1.1rem;
            }

            .influence-bar {
                margin-bottom: 1.5rem;
            }

            .influence-info {
                display: flex;
                justify-content: space-between;
                margin-bottom: 0.5rem;
                font-weight: 600;
                font-size: 0.9rem;
            }

            .influence-progress {
                height: 8px;
                background: rgba(0, 0, 0, 0.05);
                border-radius: 4px;
                overflow: hidden;
            }

            [data-theme="dark"] .influence-progress {
                background: rgba(255, 255, 255, 0.05);
            }

            .influence-fill {
                height: 100%;
                border-radius: 4px;
                transition: width 1s ease-out;
            }

            .influence-high {
                background: linear-gradient(to right, #10b981, #059669);
            }

            .influence-medium {
                background: linear-gradient(to right, #f59e0b, #d97706);
            }

            .influence-low {
                background: linear-gradient(to right, #ef4444, #dc2626);
            }

            .action-buttons {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
                margin-top: 2rem;
            }

            .btn-premium {
                padding: 1rem 1.5rem;
                border-radius: 12px;
                font-weight: 600;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                border: none;
            }

            .btn-primary-premium {
                background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
                color: white;
                box-shadow: 0 4px 14px 0 rgba(13, 148, 136, 0.39);
            }

            .btn-secondary-premium {
                background: rgba(255, 255, 255, 0.1);
                color: var(--text-main);
                border: 1px solid var(--glass-border);
            }

            .btn-premium:hover {
                transform: translateY(-2px);
                filter: brightness(1.1);
            }

            .share-section {
                margin-top: 3rem;
                text-align: center;
                border-top: 1px solid var(--glass-border);
                padding-top: 2rem;
            }

            .share-links {
                display: flex;
                justify-content: center;
                gap: 1.5rem;
                margin-top: 1rem;
            }

            .share-icon {
                font-size: 1.5rem;
                color: var(--text-muted);
                transition: color 0.3s ease, transform 0.3s ease;
            }

            .share-icon:hover {
                color: var(--accent-primary);
                transform: scale(1.2);
            }

            #scoreSlider {
                display: none;
                /* Hide the old slider, we'll use the gauge */
            }

            @media (max-width: 768px) {
                .glass-card {
                    padding: 1.5rem;
                }

                .action-buttons {
                    grid-template-columns: 1fr;
                }

                .header-section h1 {
                    font-size: 1.75rem;
                }
            }
        </style>



    @endpush




    <div class="result-container">
        <div class="glass-card">
            <div class="header-section">
                <h1>Decision Results</h1>
                <p class="text-muted">Based on your evaluation, here is our rational recommendation.</p>
            </div>

            <div class="score-visualization">
                <div class="smiley-scale">
                    <span class="smiley" data-score="0">😡</span>
                    <span class="smiley" data-score="20">😬</span>
                    <span class="smiley" data-score="40">😞</span>
                    <span class="smiley" data-score="60">😐</span>
                    <span class="smiley" data-score="80">😀</span>
                    <span class="smiley" data-score="100">👍</span>
                </div>

                <div class="gauge-container">
                    <svg class="gauge-svg" viewBox="0 0 200 200">
                        <circle class="gauge-background" cx="100" cy="100" r="90" />
                        <circle id="gaugeProgress" class="gauge-progress" cx="100" cy="100" r="90" />
                    </svg>
                    <div id="score" class="score-text">0%</div>
                </div>

                <input type="range" id="scoreSlider" min="0" max="100" value="0" disabled>
            </div>

            <div class="decision-section text-center">
                <div class="decision-label">Final Verdict</div>
                <div id="decision" class="decision-text">Analyzing...</div>
                <div id="badge" class="mt-2"></div>
            </div>

            <div class="advice-card">
                <div class="advice-header">
                    <i class="fas fa-lightbulb text-warning"></i>
                    <span>Personalized Guidance</span>
                </div>
                <p id="personalisedAdvice" class="mb-0">Calculating your tailored advice...</p>
            </div>

            <div id="commentsCard" class="advice-card" style="display: none;">
                <div class="advice-header">
                    <i class="fas fa-comment-dots text-info"></i>
                    <span>Reviewer's Comments</span>
                </div>
                <p id="comments" class="mb-0"></p>
            </div>

            <!-- Hidden image element to satisfy JS -->
            <img id="image" src="" alt="" style="display: none;">

            <div class="advice-card">
                <div class="advice-header">
                    <i class="fas fa-list-check text-primary"></i>
                    <span>Key Considerations</span>
                </div>
                <ul id="advice-list" class="advice-list mb-0"></ul>
            </div>

            <div class="text-center mb-4">
                <button id="toggleInfluences" class="btn btn-premium btn-secondary-premium btn-sm">
                    <i class="fas fa-chart-simple"></i> Show Influencing Factors
                </button>
            </div>

            <div id="influenceBreakdown" class="mt-4" style="display: none;"></div>

            <div class="action-buttons">
                <a href="/#questions" class="btn btn-premium btn-primary-premium">
                    <i class="fas fa-rotate-left"></i> Take Quiz Again
                </a>
                <button id="emailModalBtn" data-bs-toggle="modal" data-bs-target="#emailModal"
                    class="btn btn-premium btn-secondary-premium">
                    <i class="fas fa-envelope"></i> Email Result
                </button>
            </div>

            <div class="share-section">
                <p class="text-muted small mb-3">Share your rational decision</p>
                <div class="share-links">
                    <a href="#" id="twitterShare" class="share-icon" title="Share on Twitter"><i
                            class="fab fa-x-twitter"></i></a>
                    <a href="#" id="whatsappShare" class="share-icon" title="Share on WhatsApp"><i
                            class="fab fa-whatsapp"></i></a>
                    <a href="#" id="facebookShare" class="share-icon" title="Share on Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" id="linkedinShare" class="share-icon" title="Share on LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a href="#" id="redditShare" class="share-icon" title="Share on Reddit"><i
                            class="fab fa-reddit-alien"></i></a>
                </div>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-auto">
                    <div class="d-flex align-items-center gap-2">
                        <label for="languageSelect" class="form-label mb-0 small text-muted">Language:</label>
                        <select id="languageSelect" class="form-select form-select-sm w-auto">
                            <option value="en" selected>English</option>
                            <option value="es">Spanish</option>
                            <option value="fr">French</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}

    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Please, enter the email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="emailModal">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter the email">
                        </div>
                        <p class="small" id="emailHelp"></p>
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" id="submitResult">Submit</button>
                </div>

            </div>

        </div>
    </div>




@endsection