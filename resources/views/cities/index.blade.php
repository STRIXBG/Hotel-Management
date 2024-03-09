<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Cities</title>
</head>
<body>
    <h1>List of Cities</h1>

    <ul>
        @foreach ($cities as $city)
            <li>{{ $city->name }}</li>
        @endforeach
    </ul>
</body>
</html>
