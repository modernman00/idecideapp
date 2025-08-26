@extends('base')

@section('title', 'Decision Matrix')


@section('content')



    <section class="hero">

        <div class="overlay">
            <h1>The Smart Decisioning Tool</h1>
            <a href="#questions" class="cta-button">Click for your questions</a>
        </div>


    </section>



    <div class = "container overflow-hidden text-center">

        <div class="description row row-cols-1 row-cols-md-2 g-4">

            <div class="description-image col">
                <img src="public/images/about-image.jpg" alt="Smart Decision Tool" class="hero-image">
            </div>

            <div class="description-text col" id="mainDescription">

                <h3 class="subtitle">Every purchase satisfies either a need or want and most times we are conflicted on
                    whether to spend on something we desire or not</h3>
                <h3 class="subtitle">Especially in this modern world, where we are bombarded with advertisements on the
                    latest items/products/services. With all, trying to convince us to spare our pennies, and the reality is
                    that, it is difficult not be influenced by this desire to buy, sometimes, things we don't need, or even
                    want. This creates a strong pull toward many ‘nice-to-have’ things.</h3>
                <h3 class="subtitle"> <span class="highlight">Our app is created to guide you in making fair and rational
                        decisions when conflicted on whether to make a purchase or not.</span> Using our simple list of
                    questions can help you to make smarter buying decisions in all areas of your expenditures.</h3>

            </div>
        </div>
        <br><br>


        {{-- <div class="notification"></div> --}}

        <form id="questions" class="questions" action="post">

            @php

                $formArray = [
                    'Questions to Consider' => 'title',
                    'x1' => 'br',
                    'x2' => 'hr',

                    'purchase' => [
                        'mixed',
                        'label' => [
                            'What do you want to buy? This could be anything?',
                            'How does the item cost compare to your income/budget?',
                            'If you bought it, how would it make you feel?',
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
                                5 => 'Less than 5% of my income/budget',
                                4 => '5–10% of my income/budget',
                                3 => '10–15% of my income/budget',
                                2 => '15–20% of my income/budget',
                                1 => 'Over 20% of my income/budget',
                            ],
                            [
                                5 => 'Happy and satisfied',
                                4 => 'Over the moon',
                                3 => 'Satisfied but not thrilled',
                                2 => 'Mixed feelings',
                                1 => 'No difference or Not sure',
                            ],
                        ],
                    ],
                    'x3' => 'br',

                    'consideration' => [
                        'mixed',
                        'label' => [
                            'How long have you been thinking about it?',
                            'Is this a Need - necessity or a Want - nice to have?',
                            'Have you explored other options or alternatives to this item?',
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
                                1 => 'Just now',
                                2 => 'One month',
                                3 => 'Two Months',
                                4 => 'Over Three Months ',
                                5 => 'I have been thinking about it for a long time',
                            ],

                            [
                                5 => 'Yes - Necessity. I really need it',
                                3 => 'I love and want it',
                                2 => 'It is just something nice to have',
                                1 => 'I just feel like spending to spoil myself',
                            ],
                            [
                                5 => 'Yes, this is the best option after review',
                                3 => 'No, perhaps I should',
                                2 => 'No, I don\'t need to.',
                                1 => 'No and I don\'t care',
                            ],
                        ],
                    ],
                    'x5' => 'br',

                    'finance' => [
                        'mixed',
                        'label' => [
                            'How would you pay for the item?',
                            'Can you afford it without stretching your finance?',
                            'Are you concerned about your debt, expenses, or job?',
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
                                5 => 'Salary, Savings, Bonus, Gift',
                                2 => 'Credit card',
                                3 => 'Borrowing from family or friends',
                                4 => 'Bank loan, or other loan',
                                1 => 'Unknown',
                            ],
                            [
                                5 => 'Yes!',
                                4 => 'Yes, but may cut expenses',
                                3 => 'Yes but stretching',
                                2 => 'No',
                                1 => 'No but I\'ll buy it anyway',
                            ],
                            [
                                5 => 'No concerns',
                                3 => 'Some concerns but I can manage',
                                2 => 'Significant concerns',
                                1 => 'Serious/crippling concerns',
                            ],
                        ],
                    ],
                    'x7' => 'br',

                    'checkbox' => 'By continuing you agree to the <a href="terms">Terms of use policy</a>',
                    'x8' => 'br',
                    'Submit to get a decision' => 'button',
                    'token' => 'token',

                    'x9' => 'br',
                ];

                $form = new Src\BuildFormBStrap($formArray);

                $form->genForm();

            @endphp

                 {{-- <div class="g-recaptcha" data-sitekey="{{ $_ENV['RECAPTCHA_KEY'] }}" data-theme="dark"></div> --}}

            <div id="syncStatus" class="badge hidden">
                💾 Saved for later – will sync when online.
            </div>
            <br>







        </form>

        <script nonce="{{ $nonce }}">
            document.getElementById('button').classList.add('btn-lg', 'btn-block');
        </script>


    @endsection
