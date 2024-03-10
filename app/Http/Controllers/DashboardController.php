<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    public function index() {
        $user = Auth::user();
        $hotels = $user->hotels()->get();
        return view('dashboard.index', ['hotels' => $hotels, 'section' => 'Home']);
    }

    public function hotels() {
        $user = Auth::user();
        $hotels = $user->hotels()->get();
        return view('dashboard.index', ['hotels' => $hotels, 'section' => 'Hotels']);
    }
}
