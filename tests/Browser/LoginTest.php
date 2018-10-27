<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testExample()
    {
        $pass = '123456';

        $user=factory(User::class)->create([
            'email'=>'fake@laravel.com',
            'ra'=>'231231',
            'name'=>'nick',
            'password'=>bcrypt($pass)
        ]);

        $this->browse(function ($browser) use($user){
            $browser->visit('/login')
                ->assertSee('login')
                ->type('email',$user->email)
                ->type('password',$pass)
                ->press('Login')
                ->assertPathIs('/home');

        });
    }
}
