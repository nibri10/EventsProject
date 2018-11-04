<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserRegistrationEvent;
use App\Event;


class UserRegistrationEventController extends Controller
{
    public function index(){

        $userRegistration = DB::table('user_registration_events')
            ->join('users','user_id_user','=','users.id')
            ->join('events','event_id_event','=','events.id')
            ->select('users.name as username','events.name as eventname')
            ->get();

        //dd($userRegistration); Teste de requisãp
        return view('userRegistration.show',compact('userRegistration'));

    }

    public function show(UserRegistrationEvent $register)
    {
        return view('events.show',compact('register'));
    }

    public  function store(Request $request){

        //dd($request->all());

       try {

           $evento = Event::find($request->event_id_event);
           $evento->decrement('vacancies', 1);
           UserRegistrationEvent::create($request->all());
           return redirect()->route('events.index')->with('success','Evento criado com sucesso');

       } catch (ModelNotFoundException $exception){
           $evento = Event::find($request->event_id_event);
           $evento->increment('vacancies', 1);
           return back()->withErrors('Não é possível se cadastrar no evento')->withInput();

       }catch (QueryException $e){
           $evento = Event::find($request->event_id_event);
           $evento->increment('vacancies', 1);
           return back()->withErrors('Não é possível se cadastrar no evento')->withInput();
       }






    }

}
