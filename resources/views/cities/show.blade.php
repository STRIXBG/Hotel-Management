<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show City</title>
</head>
<body>
    <h1>City Details</h1>

    <p><strong>City Name:</strong> {{ $city->name }}</p>

    <a href="{{ route('cities.index') }}">Back to City List</a>
</body>
</html>
