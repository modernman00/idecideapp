@extends('admin.base')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="container py-4">
        <h2 class="mb-4">Dashboard Overview</h2>

        <div class="row g-4">

            <!-- Newly Created Accounts -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">New Accounts</div>
                    <div class="card-body">
                        <ul class="list-group" id="accountList">
                            <!-- Dynamically populated -->
                            <li class="list-group-item">user@example.com <span class="badge bg-success">New</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- New Decisions -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">New Decisions</div>
                    <div class="card-body">
                        <ul class="list-group" id="decisionList">
                            <!-- Dynamically populated -->
                            <li class="list-group-item">Decision #123: Approved</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Blog Management -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <span>Blog Management</span>
                        <button class="btn btn-sm btn-light" onclick="createBlog()">+ New Blog</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
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
                            <tbody id="blogTable">
                                @foreach ($blogs as $blog)
                                    <!-- Dynamically populated -->
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td> {{ $blog['id'] }} </td>
                                        {{-- application date --}}
                                        <td> {{ date('Y-m-d', strtotime($blog['created_at'])) }} </td>
                                        <td> {{ $blog['title'] }} </td>
                                        <td> {{ $blog['content'] }} </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1"
                                                onclick="editBlog({{ $blog['id'] }})">Edit</button>
                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="deleteBlog({{ $blog['id'] }})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function editBlog(id) {
            // REDIRECT TO EDIT BLOG PAGE
            window.location.href = '/editBlog/' + id;
        }

        function deleteBlog(id) {
            if (confirm('Are you sure you want to delete this blog?')) {
                // REDIRECT TO DELETE BLOG PAGE
                window.location.href = '/deleteBlog/' + id;
            }
        }
    </script>

@endsection
