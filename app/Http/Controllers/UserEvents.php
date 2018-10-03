<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Events;

class UserEvents extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $events = Events::latest()->paginate(100);
        return view('user.IndexEvents',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }
}
