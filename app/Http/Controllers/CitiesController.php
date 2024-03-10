<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller {
    /*
     * Displays Cities
     */

    public function index() {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    /*
     * Creates City
     */

    public function create() {
        return view('cities.create');
    }

    /*
     * Stores city in DB
     */

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:cities',
                // Add other validation rules if necessary
        ]);

        City::create($request->all());

        return redirect()->route('cities.index')
                        ->with('success', 'City created successfully');
    }

    /*
     * Shows City
     */

    public function show(City $city) {
        return view('cities.show', compact('city'));
    }

    /*
     * Edits selected city
     */

    public function edit(City $city) {
        return view('cities.edit', compact('city'));
    }

    /*
     * Updates city
     */

    public function update(Request $request, City $city) {
        $request->validate([
            'name' => 'required|unique:cities',
        ]);

        $city->update($request->all());

        return redirect()->route('cities.index')
                        ->with('success', 'Hotel updated successfully');
    }

    /*
     * Destroys city
     */

    public function destroy(City $city) {
        $city->delete();

        return redirect()->route('cities.index')
                        ->with('success', 'City deleted successfully');
    }
}
