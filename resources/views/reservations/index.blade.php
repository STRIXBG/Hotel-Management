<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations List</title>
</head>
<body>
    <h1>Reservations List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Hotel</th>
                <th>Room</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->hotel->name }}</td>
                    <td>{{ $reservation->room->number }}</td>
                    <td>{{ $reservation->start_date }}</td>
                    <td>{{ $reservation->end_date }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>
                        <!-- Add your actions: view, edit, delete -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
