<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Comments</title>
</head>
<body>
    <h1>List of Comments</h1>

    <ul>
        @foreach ($comments as $comment)
            <li>Title: {{ $comment->title }}, Comment: {{ $comment->comment }}</li>
        @endforeach
    </ul>
</body>
</html>
