<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Services;

class DashboardController extends Controller {

    public function index() {
        $user = Auth::user();
        $hotels = $user->hotels()->get();
        return view('dashboard.index', ['hotels' => $hotels, 'section' => 'Home']);
    }

    public function deleteHotel(Hotel $hotel) {
        $user = Auth::user();
        $hotels = $user->hotels()->get();
        $hotels_count = count($hotels);
        $cities = City::all();

        return view('dashboard.hotels.delete', [
            'hotels' => $hotels,
            'hotel' => $hotel,
            'section' => 'Hotels',
            'cities' => $cities
        ]);
    }

    public function visitHotel(Hotel $hotel) {
        $user = Auth::user();
        $hotels = $user->hotels()->get();
        $reservations = $hotel->reservations()->get();
        $rooms = $hotel->rooms()->get();
        $hotels_count = count($hotels);
        $cities = City::all();

        return view('dashboard.hotels.visit', [
            'hotels' => $hotels,
            'hotel' => $hotel,
            'hotels_count' => $hotels_count,
            'section' => 'Hotels',
            'rooms' => $rooms,
            'reservations' => $reservations,
        ]);
    }

    public function hotels() {
        $user = Auth::user();
        $hotels = $user->hotels()->get();
        $hotels_count = count($hotels);
        $cities = City::all();
        return view('dashboard.hotels', [
            'hotels' => $hotels,
            'hotels_count' => $hotels_count,
            'section' => 'Hotels',
            'cities' => $cities
        ]);
    }
}
