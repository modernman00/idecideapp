@extends('base')

@section('title', 'Decision Matrix')


@section('content')
@section('data-page-id', '/')

@push('styles_main')
<style nonce="{{ $nonce }}">
    .questions-section {
        background: var(--background-light);
        padding: 100px 0;
    }

    .questions-form .card {
        background: #fff;
        border: 1px solid var(--glass-border);
        border-radius: var(--radius-lg);
        padding: 2.5rem;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        margin-bottom: 2rem;
        height: 100%;
    }

    /* Force 3 cards per row on desktop */
    @media (min-width: 992px) {
        .questions-form {
            display: block !important;
        }
        .questions-form .row {
            display: grid !important;
            grid-template-columns: repeat(3, 1fr) !important;
            gap: 24px !important;
            width: 100% !important;
            margin: 0 !important;
        }
        .questions-form .row > div {
            width: 100% !important;
            max-width: 100% !important;
            flex: none !important;
            padding: 0 !important;
        }
    }

    .questions-form .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    }

    .questions-form .card-title {
        font-family: var(--font-heading);
        font-weight: 800;
        font-size: 1.5rem;
        color: var(--text-main);
        margin-bottom: 1.5rem;
    }

    .questions-form .form-label {
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .questions-form .form-select, .questions-form .form-control {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        border: 1px solid var(--glass-border);
        background: #fdfdfd;
    }

    .questions-form .form-select:focus, .questions-form .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(27, 94, 32, 0.1);
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-color);
        color: white;
        padding: 1.25rem 2.5rem;
        border-radius: 100px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
    }

    .cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(27, 94, 32, 0.2);
        color: white;
        filter: brightness(1.1);
    }
</style>
@endpush

    <section class="hero" style="background: var(--background-light); color: var(--text-main); height: auto; padding: 100px 0; margin-bottom: 0;">
        <div class="overlay" style="background: transparent; backdrop-filter: none; border: none; box-shadow: none; animation: none;">
            <h1 style="color: var(--text-main); font-size: 4.5rem; line-height: 1; letter-spacing: -0.02em;">Budget <br><span class="text-primary" style="-webkit-text-fill-color: var(--primary-color);">Boss</span></h1>
            <p class="subtitle text-center mb-5" style="color: var(--text-muted); font-size: 1.5rem; max-width: 600px; margin: 2rem auto;">Master your spending with our rational decision making app.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#questions" class="cta-button" style="background: var(--primary-color); padding: 1.5rem 3rem; font-size: 1.1rem;">Start Evaluation <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="description py-5">
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="feature-card" style="background: #fff; padding: 3rem; border-radius: var(--radius-lg); border: 1px solid var(--glass-border); text-align: left;">
                        <div class="feature-icon" style="color: var(--primary-color); font-size: 2rem; margin-bottom: 1.5rem;"><i class="fas fa-shield-halved"></i></div>
                        <h4 style="font-weight: 800; margin-bottom: 1rem;">Rational Guide</h4>
                        <p class="text-muted" style="font-size: 1.1rem; line-height: 1.6;">Avoid impulsive buys with our structured evaluation framework designed for modern consumers.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card" style="background: #fff; padding: 3rem; border-radius: var(--radius-lg); border: 1px solid var(--glass-border); text-align: left;">
                        <div class="feature-icon" style="color: var(--primary-color); font-size: 2rem; margin-bottom: 1.5rem;"><i class="fas fa-chart-line"></i></div>
                        <h4 style="font-weight: 800; margin-bottom: 1rem;">Financial Clarity</h4>
                        <p class="text-muted" style="font-size: 1.1rem; line-height: 1.6;">Compare item costs against your actual budget and income to understand the real financial impact.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card" style="background: #fff; padding: 3rem; border-radius: var(--radius-lg); border: 1px solid var(--glass-border); text-align: left;">
                        <div class="feature-icon" style="color: var(--primary-color); font-size: 2rem; margin-bottom: 1.5rem;"><i class="fas fa-heart-circle-check"></i></div>
                        <h4 style="font-weight: 800; margin-bottom: 1rem;">Need vs. Want</h4>
                        <p class="text-muted" style="font-size: 1.1rem; line-height: 1.6;">Clearly distinguish between necessities and "nice-to-haves" before you commit your pennies.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="public/images/about-image.jpg" alt="Smart Decision Tool" class="img-fluid" style="border-radius: 40px; box-shadow: var(--shadow-lg);">
                        <div class="position-absolute bottom-0 end-0 p-4" style="background: var(--primary-color); color: white; border-top-left-radius: 30px; display: none;">
                            <h3 class="mb-0">Smart Choice</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="display-5 mb-4" style="font-weight: 800;">Decide with <span class="highlight" style="color: var(--primary-color); font-weight: 800;">Precision</span></h3>
                    <p class="subtitle" style="font-size: 1.2rem; color: var(--text-muted);">Our app is created to guide you in making fair and rational decisions when conflicted on whether to make a purchase or not.</p>
                    <p class="subtitle" style="font-size: 1.2rem; color: var(--text-muted);">Using our simple list of questions can help you to avoid the 'nice-to-have' trap and focus on what truly matters for your lifestyle and financial health.</p>
                    <div class="d-flex gap-4 mt-4">
                        <div class="p-4 bg-white shadow-sm rounded-4 border border-light" style="flex: 1;">
                            <h5 class="mb-1" style="color: var(--primary-color); font-weight: 800; font-size: 1.5rem;">100%</h5>
                            <small class="text-muted" style="text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600;">Rational</small>
                        </div>
                        <div class="p-4 bg-white shadow-sm rounded-4 border border-light" style="flex: 1;">
                            <h5 class="mb-1" style="color: var(--primary-color); font-weight: 800; font-size: 1.5rem;">Free</h5>
                            <small class="text-muted" style="text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600;">To Use</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="questions" class="questions-section py-5">
            <div class="container" style="max-width: 1300px;">
                <div class="text-center mb-5 mt-5">
                    <h2 class="display-5 mb-3" style="font-weight: 800;">Evaluation Quiz</h2>
                    <p class="text-muted" style="font-size: 1.1rem;">Answer the following questions honestly to get an objective decision score.</p>
                </div>

            <form id="questionsForm" class="questions-form" action="post">
                @php
                    $formArray = [
                        'purchase' => [
                            'mixed',
                            'label' => [
                                'What are you planning to purchase?',
                                'Financial Impact: Cost vs. Monthly Income/Budget',
                                'Utility: How often will you actually use this?',
                            ],
                            'attribute' => ['whatToBuy', 'cost', 'buyingFeeling'],
                            'inputType' => ['cardSelect', 'cardSelect', 'cardSelect'],
                            'img' => [
                                '/public/images/CARS.jpg',
                                '/public/images/THINKING_OF_WHY.jpg',
                                '/public/images/FEELINGS.jpg',
                            ],
                            'options' => [
                                '',
                                [
                                    5 => 'Negligible (Less than 5%)',
                                    4 => 'Noticeable (5–10%)',
                                    3 => 'Significant (10–20%)',
                                    2 => 'Heavy (20–30%)',
                                    1 => 'Critical (Over 30%)',
                                ],
                                [
                                    5 => 'Daily / Essential Tool',
                                    4 => 'Weekly / Regular Use',
                                    3 => 'Monthly / Seasonal',
                                    2 => 'Occasionally / Special Events',
                                    1 => 'Rarely / One-off use',
                                ],
                            ],
                        ],

                        'consideration' => [
                            'mixed',
                            'label' => [
                                'Cooling Period: How long has this been on your mind?',
                                'Classification: Why do you want this?',
                                'Research: Have you compared at least 3 alternatives?',
                            ],
                            'attribute' => ['notImpulsive', 'necessity', 'option'],

                            'inputType' => ['cardSelect', 'cardSelect', 'cardSelect'],

                            'img' => [
                                '/public/images/THINKING_AT_TABLE.jpg',
                                '/public/images/BUY_LESS_CHOOSE_WISE.jpg',
                                '/public/images/OPTIONS.jpg',
                            ],
                            'options' => [
                                [
                                    1 => 'Just saw it today',
                                    2 => 'A few days',
                                    3 => 'A few weeks',
                                    5 => 'Over a month (Solid intent)',
                                ],

                                [
                                    5 => 'Necessity (Health, Work, or Survival)',
                                    4 => 'Growth (Education or Self-Improvement)',
                                    3 => 'Pure Enjoyment (Hobby/Entertainment)',
                                    2 => 'Social / Status (Trending item)',
                                    1 => 'Spontaneous (Just feels right)',
                                ],
                                [
                                    5 => 'Yes, this is the best value option',
                                    3 => 'I checked one other place',
                                    1 => 'No, I want *this* specific one only',
                                ],
                            ],
                        ],

                        'finance' => [
                            'mixed',
                            'label' => [
                                'Funding: Where is the money coming from?',
                                'Buffer: If you buy this, do you still have an emergency fund?',
                                'External Stress: Are you currently worried about debt or job security?',
                            ],
                            'attribute' => ['paymentSource', 'affordability', 'concerns'],
                            'inputType' => ['cardSelect', 'cardSelect', 'cardSelect'],
                            'img' => [
                                '/public/images/CREDIT.jpg',
                                '/public/images/MONEY.jpg',
                                '/public/images/DEBT_LEVEL.jpg',
                            ],
                            'options' => [
                                [
                                    5 => 'Disposable Savings / Bonus',
                                    4 => 'Monthly Cashflow (Budgeted)',
                                    2 => 'Credit Card (Paid next month)',
                                    1 => 'Debt / Financing / High-Interest',
                                ],
                                [
                                    5 => 'Yes, my savings are untouched',
                                    3 => 'It will dip into my savings slightly',
                                    1 => 'No, this is my last bit of cash',
                                ],
                                [
                                    5 => 'Completely secure / No debt',
                                    3 => 'Some minor debt, but manageable',
                                    1 => 'Stressed / High debt / Job uncertainty',
                                ],
                            ],
                        ],



                        'share_public' => [
                            'mixed',
                            'label' => [
                                'Share anonymized result with the community? (Identity remains hidden)',
                            ],
                            'attribute' => ['isPublic'],
                            'inputType' => ['checkbox'],
                        ],

                        'checkbox' => 'By continuing you agree to the <a href="terms" class="text-primary">Terms of use policy</a>',
                        'Calculate My Decision' => 'button',
                        'token' => 'token',
                    ];

                    $form = new Src\BuildFormBStrap($formArray);
                    $form->genForm();
                @endphp

                <!-- <div id="syncStatus" class="badge bg-info hidden">
                    💾 Saved for later – will sync when online.
                </div> -->
            </form>
            </div>
        </section>
    </div>

    <script nonce="{{ $nonce }}">
        // Scroll reveal animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('hidden');
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card, .feature-card').forEach(el => {
            el.classList.add('hidden');
            observer.observe(el);
        });

        // Button styling
        const submitBtn = document.getElementById('button');
        if (submitBtn) {
            submitBtn.classList.add('cta-button', 'w-100', 'mt-4');
            submitBtn.style.maxWidth = '400px';
            submitBtn.style.margin = '0 auto';
            submitBtn.style.display = 'block';
        }
    </script>


    @endsection
