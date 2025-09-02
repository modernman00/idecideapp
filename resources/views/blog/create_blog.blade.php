@extends ('baseBulmaForm')
@section('title', 'Decision Matrix')
@section('content')



    <form id="createBlog" method="post" class="styleform_form createBlog" enctype="multipart/form-data">
        <div class="form-group">
            <div class='row'>

                @php

                    $formArray = [

                        'createBlog_notification' => 'showError',
                        'create a new blog' => 'title',
                    
                        'Intro' => [
                            'mixed',
                            'label' => [
                                'Title',
                                'blog_image',
                                'Write your blog here'
                            ],
                            'attribute' => [
                                'title',
                                'blogImg',
                                'content'
                            ],
                            'inputType' => [
                                'textarea',
                                'file',
                                'textarea'
                            ],
                            'placeholder' => [
                                'Enter the title of your post here.',
                                'Choose an image',
                                'Write your blog here'
                            ],
                        ],

                        'token' => 'token',

                        'Submit' => 'button',

                        'recaptchar' => 'recaptcha',
                    ];

                    $form = new Src\BuildFormBulma($formArray);

                    $form->genForm();

                @endphp

                <br>
</div>

                {{-- <div class="g-recaptcha" data-sitekey="{{ $_ENV['RECAPTCHA_KEY'] }}" data-theme="dark"></div> --}}

            </div>

    </form>




@endsection
