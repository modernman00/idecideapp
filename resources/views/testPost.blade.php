@extends('base')
@section('title', 'Login')
@section('content')

    {{-- <div class="styleForm" style="margin-top: 2rem;"> --}}

    <form action="" method="" id="testPost" class="testPost styleForm" enctype="multipart/form-data">

        <div class='form-group'>
            <br>
            <div class='row'>

                @php

                    $formArray = [
                        'testPost_notification' => 'showError',
                        'work_information' => 'title',

                        'account1' => [
                            'mixed',
                            'label' => ['employment status', 'Occupation'],
                            'attribute' => ['employmentStatus', 'occupation'],
                            'value' => ['Self-employed', 'Lawyer'],
                            'placeholder' => ['null', 'Accountant, Housewife, Student, Business man etc'],
                            'inputType' => ['select', 'text'],
                            'options' => [['select', 'Self-employed', 'Unemployed', 'Full-time-employment', 'Student']],
                            'icon' => ['<i class="fas fa-info-circle"></i>', '<i class="fas fa-user-md"></i>'],
                        ],

                        // 'create an account' => 'title',
                        // // account

                        'account2' => [
                            'mixed',
                            'label' => ['Password', 'Confirm password'],
                            'attribute' => ['password', 'confirm_password'],
                             'value' => ['National2@', 'National2@'],
                            'placeholder' => ['xxxx', 'xxxx'],
                            'inputType' => ['password', 'password'],
                            'icon' => [
                                '<i class="fas fa-user-secret"></i>',
                                '<i class="fas fa-user-secret"></i>',
                                // '<i class="fas fa-user-secret"></i>',
                            ],
                        ],

                         'account3' => [
                            'mixed',
                            'label' => ['email', 'age'],
                            'attribute' => ['email', 'age'],
                             'value' => ['wogn@gmail.com', 45],
                            'placeholder' => ['xxxx', 'xxxx'],
                            'inputType' => ['email', 'number'],
                            'icon' => [
                                '<i class="fas fa-email"></i>',
                                '<i class="fas fa-user"></i>',
                                // '<i class="fas fa-user-secret"></i>',
                            ]
                        ],

                        'checkbox' => 'Remember me',
                        'token' => 'token',
                        'submit' => 'button',
                        'showPassword' => 'showPassword',
                    ];

                    $form = new Src\FormBuilder($formArray);
                    $form->genForm();

                @endphp

                <br>

                <div class="g-recaptcha" data-sitekey="{{ $_ENV['RECAPTCHA_KEY'] }}" data-theme="dark"></div>
                <br>

                <a href="/forgot?verify=1"> Forgot password? Please click this link</a>

                <br><br>

            </div>
        </div>

    </form>

    {{-- </div> --}}




@endsection
