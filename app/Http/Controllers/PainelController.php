<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Event;
use App\FileEntry;

class PainelController extends Controller
{
    public function index(){
        $events = Event::all();
        $files = FileEntry::all();
        //dd($events,$files);
        return view('paginas.index',compact('events','files'));
    }
}
