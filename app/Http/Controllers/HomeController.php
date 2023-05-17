<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.index');
    }
    public function home()
    {
        $usertype = Auth::user()->user_type;
        if ($usertype == 1) {
            return view('backend.index');
        }else{
            return view('frontend.index');
        }
    }
    
}
