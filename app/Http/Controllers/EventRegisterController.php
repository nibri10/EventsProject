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

        $request->validate([
            'id_event'=>'required',
            'name_event'=>'required|max:255',
            'name'=>'required|max:255',
            'email'=>'required|max:255'

        ]);

        $events = Events::find($id);
        $quant = Events::find($vancancies);

        if($events && $quant!=0){
            $events->decrement('vacancies');
            event_register::created(request()->all());
            return redirect()->route('RegisterEvent.index')->with('success','Inscrição Efetuada com sucesso');
        }
        else {
            return redirect()->route('/')->with('errors', 'Não possivel se inscrever no evento');
        }
    }


}
