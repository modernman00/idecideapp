@extends ('baseBulmaForm')
@section('title', 'Code')
@section('content')


<div class="styleform_header">
      <h3>
        Please, enter the CODE to verify your identity
    </h3>

</div>



    <hr class="my-2">
    <form action=""  class="styleform_form" id="code" class="code">
        <div class="form-group">
            <br>
            <div class='row'>
                
                <?php

                    $formArray = [
                        "code_notification"=> "showError",
                        'code' => 'text',
                        'token' => 'token',
                        'submit' => 'button'
                    ];

                    $form = new Src\BuildFormBulma($formArray);
                    $form->genForm();

                ?>
                <br>

            </div>

    </form>



@endsection