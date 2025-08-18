@extends('baseBulmaForm')
@section('title', 'iDecide Decision Matrix - Login')
@section('content')

    {{-- <div class="styleForm" style="margin-top: 2rem;"> --}}

        <form action="" method="" id="managed" class="managed styleForm" enctype="multipart/form-data">

            <div class='form-group'>
                <br>
                <div class='row'>

                    @php

                        $formArray = [
                            'apptest_notification' => 'showError',
                            'email' => 'email',
                            'password' => 'password',
                            'checkbox' => 'Remember me',
                            'token' => 'token',
                            'submit' => 'button',
                            'showPassword' => 'showPassword',
                        ];

                        $form = new Src\BuildFormBulma($formArray);
                        $form->genForm();

                    @endphp

                    <br>

                    <div class="g-recaptcha" data-sitekey="{{ $_ENV['RECAPTCHA_KEY'] }}" data-theme="dark"></div>
                    <br>


                    {{-- <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"> --}}


                    <a href="/forgot?verify=1"> Forgot password? Please click this link</a>

                    <br><br>

                </div>
            </div>

        </form>

    {{-- </div> --}}




@endsection
