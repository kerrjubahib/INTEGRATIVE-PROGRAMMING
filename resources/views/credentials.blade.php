<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Credentials</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #000;
            color: #fff;
        }
        .credential-list {
            background: #111;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }
        .credential-item {
            padding: 10px;
            border-bottom: 1px solid #333;
            font-family: monospace;
        }
        .credential-item:last-child {
            border-bottom: none;
        }
        h1 {
            color: #0095f6;
            text-align: center;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #0095f6;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Saved Credentials</h1>
    
    <div class="credential-list">
        @forelse ($credentials as $credential)
            <div class="credential-item">
                <div style="color: #0095f6; margin-bottom: 5px;">{{ $credential['filename'] }}</div>
                <pre style="margin: 0; white-space: pre-wrap;">{{ $credential['content'] }}</pre>
            </div>
        @empty
            <div class="credential-item">
                No credentials saved yet.
            </div>
        @endforelse
    </div>

    <a href="{{ route('login.form') }}" class="back-link">&larr; Back to Login</a>
</body>
</html>
