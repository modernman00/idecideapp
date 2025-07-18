@extends('base')

@section('title', 'iDecide Decision Matrix - Blog')

@section('content')

    <table class="table">
     <caption>Blogs</caption>
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Date</th>
            <th>Title</th>
            <th>Content</th>

            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($blogs as $blog )
        <tr>
            <td> {{ $loop->iteration }}</td>
             <td> {{ $blog['id'] }} </td>
             {{-- application date --}}
              <td> {{ $blog['created_at'] }} </td>
               <td> {{ $blog['title']}} </td>
                 <td> {{ $blog['content'] }} </td>

                   <td>
                    <a href="/editBlog/{{ $blog['id'] }}">
                            <i class="fas fa-edit fa-lg" style="color:#F00A0A"></i>
                            </a>
                        </td>
                        <td>
                          <a href="/deleteBlog/{{ $blog['id'] }}" 
                              onClick="javascript: return confirm('Are you sure you want to delete this application?');"
                              title="Delete">
                            <i class="fas fa-trash-alt fa-lg" style="color:#F00A0A"></i>
                            </a>
                        </td>

        </tr>
        @endforeach




    </tbody>
    </table>



    




@endsection