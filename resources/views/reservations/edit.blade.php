<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Reservation</title>
    </head>
    <body>
        <h1>Edit Reservation</h1>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="hotel_id">Hotel ID:</label><br>
            <input type="text" id="hotel_id" name="hotel_id" required><br>

            <label for="room_id">Room ID:</label><br>
            <input type="text" id="room_id" name="room_id" required><br>

            <label for="start_date">Start Date:</label><br>
            <input type="date" id="start_date" name="start_date" required><br>

            <label for="end_date">End Date:</label><br>
            <input type="date" id="end_date" name="end_date" required><br>

            <select name="hotel_id" id="hotel_id">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select><br>

            <button type="submit">Update Reservation</button>
        </form>
    </body>
</html>
