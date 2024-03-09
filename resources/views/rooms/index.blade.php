<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Rooms</title>
</head>
<body>
    <h1>List of Rooms</h1>

    <ul>
        @foreach ($rooms as $room)
            <li>{{ $room->number }}</li>
        @endforeach
    </ul>
</body>
</html>
