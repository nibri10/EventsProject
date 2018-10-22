<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Events;
use App\Http\Requests\EventRequest;



class EventsController extends Controller {

    public function index() {

        $events = Events::latest()->paginate(100);
        return view('events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function show(Events $event)
    {
        return view('events.show',compact('event'));
    }

    public function create() {
        return view('events.create');
    }

    public function store(EventRequest $request) {

        $validated = $request->validated();

        Events::create($request->all());
        return redirect()->route('events.index')->with('success','Evento criado com sucesso');
    }
    
    public  function edit($id){
        $event = Events::find($id);
        return view('events.edit', compact('event'));
    }
    
    public function update(Request $request,$id){
        $events = Events::findOrfail($id);
        $events->update($request->all());
        return redirect()->route('events.index')->with('success','Evento Atualizado com sucesso');
    }
    
    public function destroy($id){
        $events = Events::findOrfail($id);
        $events->delete();
        
        return redirect()->route('events.index')->with('alert-message','Evento Deletado'
                . 'com sucesso!!!');
        
    }

}
