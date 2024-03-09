<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
</head>
<body>
    <h1>Edit Room</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="number">Room Number:</label><br>
        <input type="text" id="number" name="number" value="{{ $room->number }}"><br>

        <label for="type">Room Type:</label><br>
        <input type="text" id="type" name="type" value="{{ $room->type }}"><br>

        <label for="available">Available:</label><br>
        <input type="checkbox" id="available" name="available" value="1" {{ $room->available ? 'checked' : '' }}><br>

        <button type="submit">Update Room</button>
    </form>
</body>
</html>
