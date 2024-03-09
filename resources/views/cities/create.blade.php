<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New City</title>
</head>
<body>
    <h1>Create New City</h1>

    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <button type="submit">Create City</button>
    </form>
</body>
</html>
