<?php
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UsersTableSeeder::class);
        
         
      /*  User::create([
            'name'=>'Erik Figueiredo',
            'ra'=>'23034-2',
            'email'=>'erik.figueiredo@gmail.com',
            'password'=>bcrypt('123456'),
        ]);*/

        factory(\App\Event::class,100)->create();

        /* User::create([
            'name'=>'Erik Figueiredo',
            'ra'=>'23010-4',
            'level'=>'1',
            'email'=>'erik.figueired@gmail.com',
            'password'=>bcrypt('123456'),
        ]);*/
    }
}
