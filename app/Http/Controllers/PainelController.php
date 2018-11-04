<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Event;

class PainelController extends Controller
{
    public function index(){
        $events = Event::latest()->paginate(10);
        return view('paginas.index',compact('events'))->with('i',(request()->input('page', 1) - 1) * 10);
    }
}
