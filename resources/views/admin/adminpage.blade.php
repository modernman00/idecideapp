<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">Admin Panel</a>
  </nav>

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
                  <th>Title</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="blogTable">
                <!-- Dynamically populated -->
                <tr>
                  <td>How to Scale Automation</td>
                  <td>Wally</td>
                  <td>2025-08-19</td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editBlog(1)">Edit</button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteBlog(1)">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function createBlog() {
      alert('Redirect to blog creation form');
    }

    function editBlog(id) {
      alert(`Edit blog with ID: ${id}`);
    }

    function deleteBlog(id) {
      if (confirm('Are you sure you want to delete this blog?')) {
        alert(`Blog ${id} deleted`);
      }
    }
  </script>
</body>
</html>
