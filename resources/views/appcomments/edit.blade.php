<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
</head>
<body>
    <h1>Edit Comment</h1>

    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Comment:</label><br>
        <input type="text" id="title" name="title" value="{{ $comment->title }}"><br>
        <input type="text" id="comment" name="comment" value="{{ $comment->comment }}"><br>

        <button type="submit">Update Comment</button>
    </form>
</body>
</html>
