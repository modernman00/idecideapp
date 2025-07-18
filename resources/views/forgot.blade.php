@extends ('base')
@section('title', 'forgot_password')
@section('content')

<div class="styleForm">

  <img src={{ $_ENV['LOGO_DEFAULT'] }} alt="logo" class="mb-4 form__login__logo">

    <div class="styleform_header">
    <h3>Please, enter the email to verify your identity</h3>
    </div>


    <hr class="my-2">
    <form action="/forgot" id="forgotPassword" method="post" class="styleform_form">
        <div class="form-group">
            <br>
            <div class='row'>

                <?php

                    $formArray = [
                        'forgotPassword_notification'=>'showError',
                        'email' => 'email',
                        'token' => 'token',
                        'button' => 'submit'
                    ];

                    $form = new Src\BuildFormBStrap($formArray);
                    $form->genForm();

                ?>
                <br>

            </div>

    </form>
</div>



@endsection