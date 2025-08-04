<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hostels = Hostel::take(3)->get();
        $messages = Message::take(3)->get();
        return view('home', compact('hostels','messages'));
    }
    
}
