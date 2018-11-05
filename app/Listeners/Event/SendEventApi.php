<?php /** @noinspection ALL */

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

       //dd($event->request->vacancies);
       $client = new Client([
            'base_uri' => env('API_HOST'),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]);

        $post = $client->request('POST','event', [
            'json'=>[
                'arquivo'=>$event->request->arquivo,
                'city'=>$event->request->city,
                'date_finish'=>$event->request->date_finish,
                'date_initial'=>$event->request->date_initial,
                'description'=>$event->request->description,
                'local'=>$event->request->local,
                'name'=>$event->request->name,
                'target_audience'=>$event->request->target_audience,
                'time_expiration'=>$event->request->time_expiration,
                'time_initial'=>$event->request->time_initial,
                'vancancies'=>$event->request->vacancies,
            ]
        ]);

        return;






    }

}
