<?php

namespace App\Http\Controllers;

use App\Events\Event\EventCreateApi;
use Illuminate\Http\Request;
use \App\Event;
use App\Http\Requests\EventRequest;
class EventsController extends Controller {

    public function index() {
        $events = Event::all();
        return view('events.index',compact('events'));
    }
    public function create() {
        return view('events.create');
    }
    public function store(EventRequest $request) {

        $validated = $request->validated();
        //dd($request->all());
       $create= Event::create($request->all());
        event(new EventCreateApi($create));
        return redirect()->route('painel.index')->with('success','Evento Ativado com sucesso!');
    }
    
    public  function edit($id){

        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }
    
    public function update(Request $request,$id){
        $events = Event::findOrfail($id);
        $events->update($request->all());
        return redirect()->route('events.index')->with('success','Evento Atualizado com sucesso');
    }

    public function desactive($id){
        $desactive = Event::findOrfail($id);
        if($desactive->active == 0){
            $desactive->increment('active',1);
            return redirect()->route('events.index')->with('success','Evento Desativo com sucesso');}
       else
           $desactive->decrement('active',1);
       return redirect()->route('events.index')->with('success','Evento Ativado com sucesso!');
    }


    public function destroy($id){
        $events = Event::findOrfail($id);
        $events->delete();
        return redirect()->route('painel.index')->with('sucess','Evento Deletado'
                . 'com sucesso!!!');
        
    }

}
