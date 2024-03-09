<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hotel</title>
</head>
<body>
    <h1>Edit Hotel</h1>

    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ $hotel->name }}"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="{{ $hotel->address }}"><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="{{ $hotel->phone }}"><br><br>
        <button type="submit">Update Hotel</button>
    </form>
</body>
</html>
