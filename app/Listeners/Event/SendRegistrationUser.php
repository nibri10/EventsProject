<?php

namespace App\Listeners\Event;
use App\Events\Event\UserRegistration;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\UserRegistrationEvent;
use GuzzleHttp\Client;


class SendRegistrationUser implements ShouldQueue
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
     * @param  UserRegistration  $event
     * @return void
     */
    public function handle(UserRegistration $event)
    {

        $client = new Client([
            'base_uri'=>env('API_HOST'),
            'Accept'=>'application/json',
            'Content-type'=>'application/json'
        ]);
        $login = $client->request('POST','auth/signin',[
            'json'=>["username"=>"nibri10","password"=>"123456789"]]);
        $response = json_decode($login->getBody()->getContents(),true);
        $token=$response['accessToken'];
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $post = $client->request('POST','register', [
            'headers'=>$headers,
            'json'=>[
                "event_id_event"=>$event->request->event_id_event,
                "user_id_user"=>$event->request->user_id_user,

            ]
        ]);
        $response = json_decode($post->getBody(), true);
        //dd($response);
        return;

    }
}
