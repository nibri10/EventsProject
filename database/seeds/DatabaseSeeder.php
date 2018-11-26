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
        
         
        User::create([
            'name'=>'User',
            'ra'=>'23034-2',
            'email'=>'user@user.com',
            'password'=>bcrypt('123456'),
        ]);



        /* User::create([
            'name'=>'Admin',
            'ra'=>'23010-4',
            'level'=>'1',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('123456'),
        ]);*/
    }
}
