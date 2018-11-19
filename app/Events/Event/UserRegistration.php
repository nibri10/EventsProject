<?php

namespace App\Events\Event;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use App\UserRegistrationEvent;
class UserRegistration
{
    use Dispatchable, SerializesModels;

    public  $request;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UserRegistrationEvent $request)
    {
        $this->request = $request;


    }


}
