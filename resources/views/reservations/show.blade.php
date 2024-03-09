<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Reservation</title>
</head>
<body>
    <h1>Reservation Details</h1>

    <p><strong>Name:</strong> {{ $reservation->reservated_by_name }}</p>
    <p><strong>Family:</strong> {{ $reservation->reservated_by_family }}</p>
    <p><strong>Room ID:</strong> {{ $reservation->room_id }}</p>
    <p><strong>Hotel ID:</strong> {{ $reservation->hotel_id }}</p>

    <a href="{{ route('reservations.index') }}">Back to Reservations</a>
</body>
</html>
