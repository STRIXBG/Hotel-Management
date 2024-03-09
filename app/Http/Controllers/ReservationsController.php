<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

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
        return view('reservations.create');
    }

    /*
     * Stores a newly created reservation
     */

    public function store(Request $request) {
        $request->validate([
                // Правила за валидация на данните
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
        return view('reservations.edit', compact('reservation'));
    }

    /*
     * Updates a specific reservation
     */

    public function update(Request $request, Reservation $reservation) {
        $request->validate([
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
