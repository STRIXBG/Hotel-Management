<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;

class RoomsController extends Controller {
    /*
     * Shows all rooms
     */

    public function index() {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    /*
     * Creates a new room
     */

    public function create() {
        $hotels = Hotel::all();
        return view('rooms.create', compact('hotels'));
    }

    /*
     * Stores room
     */

    public function store(Request $request) {
        $request->validate([
            'number' => 'required',
            'type' => 'required',
            'available' => 'boolean',
            'hotel_id' => 'required',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')
                        ->with('success', 'Room created successfully');
    }

    /*
     * Shows specific room
     */

    public function show(Room $room) {
        return view('rooms.show', compact('room'));
    }

    /*
     * Edit Room
     */

    public function edit(Room $room) {
        return view('rooms.edit', compact('room'));
    }

    /*
     * Updates Room
     */

    public function update(Request $request, Room $room) {
        $request->validate([
            'number' => 'required',
            'type' => 'required',
                // Добавете други валидации, ако е необходимо
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')
                        ->with('success', 'Room updated successfully');
    }

    /*
     * Deletes Room
     */

    public function destroy(Room $room) {
        $room->delete();

        return redirect()->route('rooms.index')
                        ->with('success', 'Room deleted successfully');
    }
}
