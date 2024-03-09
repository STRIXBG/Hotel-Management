<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->name }}</title>
</head>
<body>
    <h1>{{ $hotel->name }}</h1>

    <p>Address: {{ $hotel->address }}</p>
    <p>Phone: {{ $hotel->phone }}</p>

    <a href="{{ route('hotels.index') }}">Back to Hotels</a>
</body>
</html>
