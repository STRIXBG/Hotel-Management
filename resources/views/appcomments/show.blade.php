<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Comment</title>
</head>
<body>
    <h1>Comment Details</h1>

    <p><strong>Title:</strong> {{ $comment->title }}</p>
    <p><strong>Comment:</strong> {{ $comment->comment }}</p>

    <a href="{{ route('comments.index') }}">Back to City List</a>
</body>
</html>
