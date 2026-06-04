<!DOCTYPE html>
<html>
<head>
    <title>Error Occurred</title>
    <style nonce="{{ $nonce }}">
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
       
        <p>We apologise for the inconvenience. Our team has been notified and is working to resolve the issue.</p>
        <p>Please try again later or contact support if the issue persists.</p>
        <p>For assistance, email us at <strong>{{ $_ENV['SUPPORT_EMAIL'] }}</strong>.</p>
        <p><a href="/">Return to Home</a></p>
        <p><a href="{{ $_ENV['APP_URL'] }}/privacy" target="_blank">Privacy Policy</a></p>
    </div>
</body>
</html>