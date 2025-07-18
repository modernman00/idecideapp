@extends('base')
@section('title', 'Change Password')
@section('content')

<div class="styleForm" style="margin-top: 2rem;">

  <img src={{ $_ENV['LOGO_DEFAULT'] }} alt="logo" class="mb-4 form__login__logo">
  <form action="/passwordChange" method="POST" class="loginNow styleform_form" id="changePassword">
    <div id="setLoader" class="loader" style="display: none;">
    </div>
    <div class="notification" id="changePassword_notification" style="display: none;">

      <p id="error"></p>
    </div>
    <div class="form-group">
                @php

                    $formArray = [
                        'changePassword_notification' => 'showError',

                        'things' => ['mixed', 
                        'label' => ['Password', 'Confirm Password'], 
                        'attribute' => ['password', 'confirm_password'], 
                        'inputType' => ['password', 'password'], 
                        'placeholder' => ['Enter your password', 'Confirm your password']
                        ],
                        'token' => 'token',
                        'button' => 'submit',


                    ];

                 $form = new Src\BuildFormBStrap($formArray);

                  $form->genForm();

                @endphp

  <br><br>

    </div>


  </form>

</div>

@endsection
