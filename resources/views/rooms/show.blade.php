<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Room</title>
    </head>
    <body>
        <h1>Room Details</h1>

        <p><strong>Room Number:</strong> {{ $room->number }}</p>
        <p><strong>Room Type:</strong> {{ $room->type }}</p>
        <p><strong>Availability:</strong> {{ $room->available ? 'Available' : 'Not Available' }}</p>

        <a href="{{ route('rooms.index') }}">Back to Room List</a>
    </body>
</html>
