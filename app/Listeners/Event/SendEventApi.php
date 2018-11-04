<?php

namespace App\Listeners\Event;

use App\Events\Event\EventCreateApi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;

class SendEventApi implements ShouldQueue
{
    protected $httpClient;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Handle the event.
     *
     * @param  EventCreateApi  $event
     * @return void
     */
    public function handle(EventCreateApi $event)
    {
        $response = $this->httpClient->post(config('x.y'), ['json' => $event->data]);
    }
}
