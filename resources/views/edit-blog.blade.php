@extends('base')

@section('title', 'Decision Matrix')

@section('content')
    <style>
        .container { max-width: 800px; margin: 2rem auto; }
        .error { color: red; display: none; margin-top: 0.5rem; font-size: 0.875rem; }
    </style>
    <div class="container">
        <h1 class="mb-4">Edit Blog Post</h1>
        <form id="editPostForm" method="POST">
            <input type="hidden" name="csrf_token" value="{{ $_SESSION['csrf_token'] ?? '' }}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ htmlspecialchars($data['title']) }}" required minlength="5" maxlength="100">
                <div id="titleError" class="error"></div>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="10" required minlength="10" maxlength="5000">{{ htmlspecialchars($data['content']) }}</textarea>
                <div id="contentError" class="error"></div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="/blog" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script nonce="{{ $nonce }}" src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script nonce="{{ $nonce }}">
        document.getElementById('editPostForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            const titleError = document.getElementById('titleError');
            const contentError = document.getElementById('contentError');
            titleError.style.display = 'none';
            contentError.style.display = 'none';

            try {
                const response = await axios.post('{{ $formAction }}', formData, {
                    headers: {
                        'X-CSRF-TOKEN': formData.get('csrf_token'),
                        'Accept': 'application/json'
                    }
                });

                alert(response.data.message.outcome);
                window.location.href = '/blog'; // Adjust redirect as needed
            } catch (error) {
                const errorMsg = error.response?.data?.message || error.response?.data?.error || 'An error occurred';
                if (errorMsg.includes('title')) {
                    titleError.textContent = errorMsg;
                    titleError.style.display = 'block';
                } else if (errorMsg.includes('content')) {
                    contentError.textContent = errorMsg;
                    contentError.style.display = 'block';
                } else {
                    alert(errorMsg);
                }
            }
        });
    </script>

@endsection