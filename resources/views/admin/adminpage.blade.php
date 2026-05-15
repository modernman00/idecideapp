@extends('admin.base')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="container py-4">
        <h2 class="mb-4">Dashboard Overview</h2>

        <div class="row g-4">

            <!-- User Management -->
            <div class="col-12">
                <div class="card shadow-sm rounded-4 border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>User Management</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td><div class="fw-bold">{{ $user['name'] }}</div></td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ date('M d, Y', strtotime($user['created_at'])) }}</td>
                                            <td><span class="badge bg-success rounded-pill">Active</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity (Decisions) -->
            <div class="col-12">
                <div class="card shadow-sm rounded-4 border-0">
                    <div class="card-header bg-info text-white py-3">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Recent Activity (Decisions)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>User ID</th>
                                        <th>Item</th>
                                        <th>Score</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($decisions as $decision)
                                        <tr>
                                            <td><code class="text-primary">{{ $decision['user_id'] }}</code></td>
                                            <td>{{ $decision['item_to_buy'] }}</td>
                                            <td>
                                                <div class="progress" style="height: 10px; width: 100px;">
                                                    <div class="progress-bar bg-{{ $decision['score'] > 60 ? 'success' : ($decision['score'] > 40 ? 'warning' : 'danger') }}" 
                                                         style="width: {{ $decision['score'] }}%"></div>
                                                </div>
                                                <small>{{ round($decision['score']) }}%</small>
                                            </td>
                                            <td>{{ date('M d, Y H:i', strtotime($decision['created_at'])) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
        function createBlog() {
            window.location.href = '/createBlog';
        }

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
