<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventsRouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRout()
    {
       $this->get('events/create')->assertStatus(200);
       

    }
}
