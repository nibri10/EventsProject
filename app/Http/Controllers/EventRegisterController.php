<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event_register;
use App\Events;


class EventRegisterController extends Controller
{
    public function index(){
        $register =event_register::latest()->paginate(100);
            return view('RegisterEvent.index',compact('register'))
                ->with('i',(request()->input('page', 1) - 1) * 100);
    }

    public function show(event_register $register)
    {
        return view('events.show',compact('register'));
    }

    public  function store(Request $request){
        // Testa os valores da requisão
        //dd($request->all());
        $evento = Events::find($request->id_event);
        $evento->decrement('vacancies', 1);

        event_register::create($request->all());


        return redirect()->route('events.index')->with('success','Evento criado com sucesso');

    }


}
