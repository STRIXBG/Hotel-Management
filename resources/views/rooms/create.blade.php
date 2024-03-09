<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Room</title>
</head>
<body>
    <h1>Create Room</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <label for="number">Room Number:</label><br>
        <input type="text" id="number" name="number" value="{{ old('number') }}"><br>

        <label for="type">Room Type:</label><br>
        <input type="text" id="type" name="type" value="{{ old('type') }}"><br>

        <label for="available">Available:</label><br>
        <input type="checkbox" id="available" name="available" value="1" {{ old('available') ? 'checked' : '' }}><br>

        <label for="hotel_id">Hotel:</label><br>
        <select name="hotel_id" id="hotel_id">
            @foreach ($hotels as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
            @endforeach
        </select><br>

        <button type="submit">Create Room</button>
    </form>
</body>
</html>
