@extends('base')

@section('title', 'Contact Us')

@section('content')

<style nonce="{{ $nonce }}">
         .title{
            color: var(--primary-color);

            .bgColor{
                background-color: var(--primary-color);
            }
        }
</style>
<div class="container my-5">
    <h1 class="text-center mb-4 title">Contact Us</h1>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2 class="title">Get in Touch</h2>
            <p>Have questions or feedback about modernman00 Decision Matrix? We'd love to hear from you! Fill out the form below or use our contact details.</p>

            <form action="/contact" method="POST" class="mt-4">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary bgColor">Send Message</button>
            </form>


        </div>
    </div>
    
    @include('include.returnToMain')
</div>
@endsection