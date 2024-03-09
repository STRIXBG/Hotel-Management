<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;

class ReservationsController extends Controller {
    /*
     * Shows every reservation
     */

    public function index() {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /*
     * Creates a new reservation
     */

    public function create() {
        $users = User::select('id', 'name')->get();
        return view('reservations.create', ['users' => $users]);
    }

    /*
     * Stores a newly created reservation
     */

    public function store(Request $request) {
        $request->validate([
            'hotel_id' => 'required',
            'room_number' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')
                        ->with('success', 'Reservation created successfully');
    }

    /*
     * Shows details of a specific reservation
     */

    public function show(Reservation $reservation) {
        return view('reservations.show', compact('reservation'));
    }

    /*
     * Shows the form for editing a reservation
     */

    public function edit(Reservation $reservation) {
        $users = User::select('id', 'name')->get();
        return view('reservations.edit', compact('reservation', 'users'));
    }

    /*
     * Updates a specific reservation
     */

    public function update(Request $request, Reservation $reservation) {
        $request->validate([
            'hotel_id' => 'required',
            'room_number' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')
                        ->with('success', 'Reservation updated successfully');
    }

    /*
     * Deletes a specific reservation
     */

    public function destroy(Reservation $reservation) {
        $reservation->delete();

        return redirect()->route('reservations.index')
                        ->with('success', 'Reservation deleted successfully');
    }
}
