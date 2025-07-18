@extends('base')

@section('title', 'iDecide Decision Matrix - Login')

@section('content')

<div class="styleForm" style="margin-top: 2rem;">

  <img src={{ $_ENV['LOGO_DEFAULT'] }} alt="logo" class="mb-4 form__login__logo">
  <form action="/managed" method="POST" class="loginNow styleform_form" id="loginNow">
    <div id="setLoader" class="loader" style="display: none;">
    </div>
    <div class="notification" id="loginNow_notification" style="display: none;">

      <p id="error"></p>
    </div>
    <div class="form-group">
@php

$formArray = [
          'SIGN' => ['mixed', 
          'label' => ['Email', 'Password'], 
          'attribute' => ['email', 'password' ], 
          'inputType' => ['email', 'password'], 
          'placeholder' => ['Enter your email', 'Enter your password']],
          'submit' => 'submit',
          'token' => 'token',

        ];



$form = new Src\BuildFormBStrap($formArray);

$form->genForm();

@endphp



 <a href="/forgot?verify=1"> Forgot password? Please click this link</a>

     <br><br>

    </div>


  </form>

</div>

@endsection
