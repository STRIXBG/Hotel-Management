<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
</head>
<body>
    <h1>Hotels</h1>

    <a href="{{ route('hotels.create') }}">Create New Hotel</a>

    @if ($hotels->count() > 0)
        <ul>
            @foreach ($hotels as $hotel)
                <li>
                    <a href="{{ route('hotels.show', $hotel->id) }}">{{ $hotel->name }}</a>
                    <p>{{ $hotel->address }}</p>
                    <p>{{ $hotel->phone }}</p>
                    <a href="{{ route('hotels.edit', $hotel->id) }}">Edit</a>
                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hotels found</p>
    @endif
</body>
</html>
