<?php

namespace App\Http\Controllers;
use App\Events\Event\UserRegistration;
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



       try {

           $UserRegistrationVerification = DB::table('user_registration_events')
               ->select('event_id_event','user_id_user')
               ->where('user_id_user',$request->user_id_user)
               ->where('event_id_event',$request->event_id_event)
               ->first();
           //dd($UserRegistrationVerification);
           if(empty($UserRegistrationVerification)){
               $evento = Event::find($request->event_id_event);
               $evento->decrement('vacancies', 1);
               $create=UserRegistrationEvent::create($request->all());
               event(new UserRegistration($create));
               return redirect()->route('events.index')->with('message','Evento criado com sucesso');
           }
            return back()->withErrors('Você já está cadastrado nesse evento')->withInput();

       } catch (ModelNotFoundException $exception){
           return back()->withErrors('Não é possível se cadastrar no evento')->withInput();

       }catch (QueryException $e){
           $evento = Event::find($request->event_id_event);
           $evento->increment('vacancies', 1);
           return back()->withErrors('Não é possível se cadastrar no evento')->withInput();
       }

    }

    public function destroy($id)
    {
        $UserRegistration = UserRegistrationEvent::findOrfail($id);
        $UserRegistration->delete();
    }

}
