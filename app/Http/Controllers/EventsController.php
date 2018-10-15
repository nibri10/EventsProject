<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Events;
use Illuminate\Support\Facades\Storage;


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

    public function store(Request $request) {

       /* Validação dos dados*/
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:300',
            'date_initial'=> 'required',
            'date_finish'=> 'required',
            'local' => 'required',
            'time' => 'required',
            'time_expiration'=> 'required',
            'city'=> 'required|max:100',
            'vacancies'=>'required',
            'target_audience'=>'required',
            'image'=>'required'

        ]);

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
