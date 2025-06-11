<!DOCTYPE html>
<html>
<head>
    <title>Error Occurred</title>
    <style>
        .error-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            border: 1px solid #e74c3c;
            background-color: #fdecea;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>An Error Occurred</h1>
        <p>{{ $error ?? 'Unknown error' }}</p>
    </div>
</body>
</html>