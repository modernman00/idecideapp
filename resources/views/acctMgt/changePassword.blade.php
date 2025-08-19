@extends('baseBulmaForm')
@section('title', 'Change Password')
@section('content')




  <form class="loginNow styleform_form" id="passwordChange">

    <div class="form-group">
                @php

                    $formArray = [
                        'passwordChange_notification' => 'showError',
                        'password' => 'password',
                        'confirm_password' => 'password',
                        'token' => 'token',
                        'submit' => 'button',
                        'showPassword' => 'showPassword'
                    ];

                    $form = new Src\BuildFormBulma($formArray);

                  $form->genForm();

                @endphp

  <br><br>

    </div>


  </form>



@endsection
