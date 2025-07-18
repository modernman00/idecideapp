@extends('base')

@section('title', 'iDecide Decision Matrix - BlogEdit')
@section('content')

<div class="container">

    <h3>Edit Blog Post</h3>

<form action="/editBlog/{{ $data['id'] }} " method="post">
    


   
  <textarea class="form-control" value="{{ $data['title'] }}" name="title" id="floatingTextarea">{{ $data['title'] }}</textarea>




    <textarea class="form-control" name="content" value="{{ $data['content'] }}" required minlength="10" maxlength="5000">{{ $data['content'] }}</textarea>

 

<br>

    <button type="submit" class="btn btn-primary">Update</button>
</form>



<br>
</div>




@endsection