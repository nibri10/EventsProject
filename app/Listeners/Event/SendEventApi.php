<?php

namespace App\Listeners\Event;

use App\Events\Event\EventCreateApi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;

class SendEventApi implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventCreateApi  $event
     * @return void
     */
    public function handle(EventCreateApi $event)
    {   $client = new Client();
        $httpClient = $client->post('');
        //dd($event);

        return;
    }
}
