@extends('base')

@section('title', 'Decision Matrix')

@section('content')
    <style>
        .container { max-width: 800px; margin: 2rem auto; }
        .error { color: red; display: none; margin-top: 0.5rem; font-size: 0.875rem; }
    </style>
    <div class="container">   
        <p id="notification"></p> 
        <form id="createPostForm" method="POST">

  @php

        $formArray = [
        
          'Create a New Blog Post' => 'title',
          'x2'=> 'hr',

             'Intro'=> ['mixed', 
             'label' => ['Title', 'blog_image'],
             'attribute' => ['title', 'blogImg'],
             'inputType' => ['text', 'file'],
             'placeholder' => ['Enter the title of your post here.', 'Select an image for your post.'],

             ],
         
            'content' => ['textarea', 'Please enter the content of your post here.'],

            'token' => 'token',
                

            'Submit' => 'button',

        ];    


        $form = new Src\BuildFormBStrap($formArray);

        $form->genForm();


        @endphp
    
        </form>
    </div>

   

@endsection