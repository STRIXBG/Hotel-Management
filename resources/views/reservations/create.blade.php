<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Reservation</title>
</head>
<body>
    <h1>Create Reservation</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf

        <label for="reservated_by_name">Name:</label><br>
        <input type="text" id="reservated_by_name" name="reservated_by_name"><br>

        <label for="reservated_by_family">Family:</label><br>
        <input type="text" id="reservated_by_family" name="reservated_by_family"><br>

        <label for="room_id">Room ID:</label><br>
        <input type="text" id="room_id" name="room_id"><br>

        <label for="hotel_id">Hotel ID:</label><br>
        <input type="text" id="hotel_id" name="hotel_id"><br>

        <button type="submit">Create Reservation</button>
    </form>
</body>
</html>
