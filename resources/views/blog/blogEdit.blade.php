@extends ('base')

@section('title', 'BlogEdit')
@section('content')

<div class="container">
<br>
    <h3>Edit The Blog Post</h3>

<form action="/editBlog/{{ $data['id'] }} " method="post">
    

<br>
<label for="title">Title</label>

{{-- id --}}
<input type="hidden" name="id" value="{{ $data['id'] }}">

<input type="text" class="form-control" id="title" name="title" value="{{ $data['title'] }}" required minlength="5" maxlength="100">
   

<br>

<label for="content">Content</label>
    <textarea class="form-control" name="content" value="{{ $data['content'] }}" required minlength="10" maxlength="5000">{{ $data['content'] }}</textarea>

 

<br>

    <button type="submit" class="btn btn-primary">Update</button>
</form>



<br>
</div>




@endsection