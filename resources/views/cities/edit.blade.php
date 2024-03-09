<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit City</title>
</head>
<body>
    <h1>Edit City</h1>

    <form action="{{ route('cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">City Name:</label><br>
        <input type="text" id="name" name="name" value="{{ $city->name }}"><br>

        <button type="submit">Update City</button>
    </form>
</body>
</html>
