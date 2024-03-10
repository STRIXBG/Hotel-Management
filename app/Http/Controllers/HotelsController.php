<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Hotel;

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
        $cities = City::all();
        return view('hotels.create', ['cities' => $cities]);
    }

    /*
     * Saves Hotel in DB
     */

    public function store(Request $request) {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to create a new hotel.');
        }

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Hotel::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'city_id' =>$request->input('city_id'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('hotels.index')
                        ->with('success', 'Hotel created successfully');
    }

    /*
     * Shows Hotel Details
     */

    public function show(Hotel $hotel) {
        return view('hotels.show', compact('hotel'));
    }

    /*
     * Edits Hotel
     */

    public function edit(Hotel $hotel) {
        return view('hotels.edit', compact('hotel'));
    }

    /*
     * Updates Hotel
     */

    public function update(Request $request, Hotel $hotel) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $hotel->update($request->all());

        return redirect()->route('hotels.index')
                        ->with('success', 'Hotel updated successfully');
    }

    /*
     * Deletes Hotel
     */

    public function destroy(Hotel $hotel) {
        $hotel->delete();

        return redirect()->route('hotels.index')
                        ->with('success', 'Hotel deleted successfully');
    }
}
