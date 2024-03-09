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

    public function show($id) {
        $city = City::findOrFail($id);
        return view('cities.show', compact('city'));
    }

    /*
     * Edits selected city
     */

    public function edit($id) {
        $city = City::findOrFail($id);
        return view('cities.edit', compact('city'));
    }

    /*
     * Updates city
     */

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|unique:cities,name,' . $id,
                // Add other validation rules if necessary
        ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        return redirect()->route('cities.index')
                        ->with('success', 'City updated successfully');
    }

    /*
     * Destroys city
     */

    public function destroy($id) {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('cities.index')
                        ->with('success', 'City deleted successfully');
    }
}
