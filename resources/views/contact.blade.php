@extends('baseBulmaForm')

@section('title', 'Contact Us')

@section('content')
@section('data-page-id', 'contact')

<form method="POST" class="contact" id="contact">
      <div class="form-group">
            <div class='row'>
            @php
                $formArray = [
                    'contact_notification' => 'showError',
                    'Get in Touch' => 'title',
                    "Have questions or feedback about Decision Matrix? We would love to hear from you! Fill out the form below or use our contact details" => 'subtitle',
                    'Intro' => [
                        'mixed',
                        'label' => [
                            'Name',
                            'Email'
                        ],
                        'attribute' => [
                            'name',
                            'email',
                        ],
                        'inputType' => [
                            'text',
                            'email',
                        ],
                        'placeholder' => [
                            'Enter your name',
                            'Enter your email',
                        ],
                        'icon' => [
                            "<i class='fas fa-user'></i>",
                            "<i class='fas fa-envelope'></i>",
                        ]
                    ],
                    'message' => [
                        'mixed',
                        'label' => ['Message'],
                        'attribute' =>  ['message'],
                        'inputType' => ['textarea']
                    ],
                    'token' => 'token',
                    'Submit' => 'button',
                    'recaptchar' => 'recaptcha',
                ];

                $form = new Src\BuildFormBulma($formArray);

                $form->genForm();
            @endphp
            </div>
</div>
</form>


    
    @include('include.returnToMainBulma')

@endsection