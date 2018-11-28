<?php

namespace App\Listeners\Event;
use App\Events\Event\EventCreateApi;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;
use App\Event;

class SendEventApi implements ShouldQueue
{
    protected $request;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  EventCreateApi  $event
     * @return Client
     */
    public function handle(EventCreateApi $event)
    {

        $client = new Client([
            'base_uri'=>env('API_HOST'),
            'Accept'=>'application/json',
            'Content-type'=>'application/json'
        ]);
        /*$register = $client->request('POST','auth/signup',[
            'json'=>[
                "name"=>"admin",
                "username"=>"nibri10",
                "email"=>"nibri.kcond2011@gmail.com",
                "role"=>["admin","admin"],
                "password"=>"123456789"
            ]

        ]);
        $register= json_decode($register->getBody()->getContents(),true);
        */
        $login = $client->request('POST','auth/signin',[
            'json'=>["username"=>"nibri10","password"=>"123456789"]]);
        $response = json_decode($login->getBody()->getContents(),true);
        $token=$response['accessToken'];
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $post = $client->request('POST','event', [
            'headers'=>$headers,
            'json'=>[
                "arquivo"=>$event->request->arquivo,
                "city"=>$event->request->city,
                "date_finish"=>$event->request->date_finish,
                "date_initial"=>$event->request->date_initial,
                "description"=>$event->request->description,
                "local"=>$event->request->local,
                "name"=>$event->request->name,
                "target_audience"=>$event->request->target_audience,
                "time_expiration"=>$event->request->time_expiration,
                "time_initial"=>$event->request->time,
                "vancancies"=>$event->request->vacancies,
            ]
        ]);
        $response = json_decode($post->getBody(), true);
        //dd($response);
     return;
    }

}
