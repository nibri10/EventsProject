<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Events;

class UserEvents extends Controller
{
    public function index() {

        $events = Events::latest()->paginate(100);
        return view('user.IndexEvents',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }
}
