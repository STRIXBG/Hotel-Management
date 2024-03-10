<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AppComment;

class HomeController extends Controller {

    public function index() {
        $comments = AppComment::take(4)->get();
        return view("public.index", compact('comments'));
    }
    

    public function post() {
        return view("admin.post");
    }
}
