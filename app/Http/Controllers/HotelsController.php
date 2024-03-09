<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\City;

class HotelsController extends Controller {
    /*
     * Shows every Hotel
     */

    public function index() {
        $hotels = Hotel::all();
        return view('hotels.index', ['hotels' => $hotels]);
    }

    /*
     * Creates a new Hotel
     */

    public function create() {
        $cities = City::all(); // Assuming you have a City model
        return view('hotels.create', ['cities' => $cities]);
    }

    /*
     * Saves Hotel in DB
     */

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Hotel::create($request->all());

        return redirect()->route('hotels.index')
                        ->with('success', 'Hotel created successfully');
    }

    /*
     * Shows Hotel Details
     */

    public function show($id) {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.show', ['hotel' => $hotel]);
    }

    /*
     * Edits Hotel
     */

    public function edit($id) {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', ['hotel' => $hotel]);
    }

    /*
     * Updates Hotel
     */

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());

        return redirect()->route('hotels.index')
                        ->with('success', 'Hotel updated successfully');
    }

    /*
     * Deletes Hotel
     */

    public function destroy($id) {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect()->route('hotels.index')
                        ->with('success', 'Hotel deleted successfully');
    }
}
