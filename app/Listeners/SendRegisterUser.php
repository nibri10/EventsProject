<?php

namespace App\Listeners;

use App\Events\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;
use App\User;

class SendRegisterUser
{
    protected $request;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    /**
     * Handle the event.
     *
     * @param  RegisterUser  $event
     * @return void
     */
    public function handle(RegisterUser $event)
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
        $post = $client->request('POST','user', [
            'headers'=>$headers,
            'json'=>[
                'name' =>$event->request->data['name'],
                'ra'=> $event->request->data['ra'],
                'email' => $event->request->data['email'],
                'level'=>'0',
                'password' => Hash::make($event->request->data['password'])
            ]
        ]);
        $response = json_decode($post->getBody(), true);
        //dd($response);
        return;
    }
}
