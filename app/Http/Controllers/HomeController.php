<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;

class HomeController extends Controller {
    
    public function test() { //TO BE REMOVED [TESTS ONLY]
        $result = Country::all();
    }

    public function index() {
        if (Auth::id())
        {
            $usertype=Auth()->user()->usertype;
            
            if ($usertype=='user')
            {
                return view('dashboard');
            }
            else if ($usertype=='admin')
            {
                return view('admin.home');
            }
            else
            {
                return redirect()->back();
            }
        }
    }
    
    public function post() {
        return view("admin.post");
    }
}
