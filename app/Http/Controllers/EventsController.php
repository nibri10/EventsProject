<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Events;

class EventsController extends Controller {

    public function index() {

        $events = Events::orderBy('created_at', 'desc')->paginate(10);
        return view('events.index', ['events' => $events]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        $event=Events::create($request->all());
        $event->save();
        
        return redirect()->route('events.create')->with('message','Evento criado'
                . 'com sucesso!!!');
    }
    
    public  function edit($id){
        $event = Events::findOrFail($id);
        
        return view('events.edit', compact($event));
    }
    
    public function update(Request $request,Events $events){
        $events->update($request->all()); 
        return redirect()->route('events.index')->with('message','Evento Atualizado'
                . 'com sucesso!!!');
    }
    
    public function destroy($id){
        $event = Events::findOrfail($id);
        $event->delete();
        
        return redirect()->route('events.index')->with('alert-message','Evento Deletado'
                . 'com sucesso!!!');
        
    }

}
