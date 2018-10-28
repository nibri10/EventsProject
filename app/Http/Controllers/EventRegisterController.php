<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\event_register;
use App\Events;


class EventRegisterController extends Controller
{
    public function index(){

        $userRegistration = DB::table('event_registers')
            ->join('users','id_user','=','users.id')
            ->join('events','id_event','=','events.id')
            ->select('users.name as username','events.name as eventname')
            ->get();

        //dd($userRegistration); Teste de requisãp
        return view('userRegistration.show',compact('userRegistration'));

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
