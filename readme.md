

<p align="center">
<a href="https://travis-ci.com/nibri10/EventsProject"><img src="https://travis-ci.com/nibri10/EventsProject.svg?branch=master" alt="Build Status"></a>
</p>

# Events Project

Project Events is a system for event creation and management that is under development and has integration with an external api made in Spring boot protected with json web token (JWT)

### Installation
   
   ##### Requirements
* [Node JS](https://nodejs.org/en/download/)  
* [Composer](https://getcomposer.org/)
* [Laravel Installation](https://laravel.com/docs/5.7#installation)
* [EventsProject-Api](https://github.com/nibri10/EventsProject-Api)

###Procedures

   * Open in root folder prompt Command 
  ###### **Steps**:
  * Run the commands 
  * 1.Composer install:
 
       ```
          composer install
       ```
   * 2.NPM install:       
      ```
       npm install
      ```
   * 3.Php Artisan key:generate
     ```
     php artisan key:generate
     ```
   * 4.Create database base with name LaravelEventsProject in Mysql
      ```
      create database  LaravelEventsProject
      ```
      
   * 4.Open archive .env adding
       ```
        DB_DATABASE=LaravelEvensProject
        DB_USERNAME=username
        DB_PASSWORD=password
        QUEUE_CONNECTION=database
        API_HOST=localhost:8080/api/
       ```
   * 6.Run php artisan migrate
      ```
      php artisan migrate
      ```
   * 7.Run Database seed 
     ```
      php artisan db:seed
     ```
      
   * 8.Run server
     ```
     php artisan serve
     ```
     
   * 9.Credentials
      * Admin
      ```
      Ra:23010-4
      Email:admin@admin.com
      Password:123456               
      ```
      * User
       ```
        Ra:23010-4
        Email:user@user.com
        Password:123456               
       ```
   * 10.Open app/Listeners/Event/SendEventApi.php
        * Retrieve comments on the first run of the project before creating a new event.
         After commenting on this code snippet
       ```
         $register = $client->request('POST','auth/signup',[
                     'json'=>[
                         "name"=>"admin", 
                         "username"=>"nibri10",
                         "email"=>"nibri.kcond2011@gmail.com",
                         "role"=>["admin","admin"],
                         "password"=>"123456789"
                     ]
                 
                 ]);
                 $register= json_decode($register->getBody()->getContents(),true);
       ```
       
  * 11.Open app/Listeners/Event/SendRegistrationUser.php
       * Retrieve comments on the first run of the project before creating a new register user in event.
        After commenting on this code snippet
       ```
          $register = $client->request('POST','auth/signup',[
                               'json'=>[
                                   "name"=>"admin", 
                                   "username"=>"nibri10",
                                   "email"=>"nibri.kcond2011@gmail.com",
                                   "role"=>["admin","admin"],
                                   "password"=>"123456789"
                               ]
                           
                           ]);
                           $register= json_decode($register->getBody()->getContents(),true); 
       ```
       
     12.Open app\Listeners\SendRegisterUser.php
         * Retrieve comments on the first run of the project before creating a new register user in event.
           After commenting on this code snippet
       ```
          $register = $client->request('POST','auth/signup',[
                                  'json'=>[
                                      "name"=>"admin", 
                                      "username"=>"nibri10",
                                      "email"=>"nibri.kcond2011@gmail.com",
                                      "role"=>["admin","admin"],
                                      "password"=>"123456789"
                                  ]
                              
                              ]);
                              $register= json_decode($register->getBody()->getContents(),true); 
       ```
      
   * 13.Open other command prompt in root folder project 
      * Run Queues
       ```
        php artisan queue:work
       ```
        
### Routes
```
+--------+----------------------------------------+---------------------------------------+----------------------------------+---------------------------------------------------------------------------------------------------+-------------------------------------------------+
| Domain | Method                                 | URI                                   | Name                             | Action                                                                                            | Middleware                                      |
+--------+----------------------------------------+---------------------------------------+----------------------------------+---------------------------------------------------------------------------------------------------+-------------------------------------------------+
|        | GET|HEAD                               | /                                     |                                  | Closure                                                                                           | web              |                              
|        | GET|HEAD                               | _dusk/login/{userId}/{guard?}         |                                  | Laravel\Dusk\Http\Controllers\UserController@login                                                | web              |                              
|        | GET|HEAD                               | _dusk/logout/{guard?}                 |                                  | Laravel\Dusk\Http\Controllers\UserController@logout                                               | web              |
|        | GET|HEAD                               | _dusk/user/{guard?}                   |                                  | Laravel\Dusk\Http\Controllers\UserController@user                                                 | web              |
|        | GET|HEAD                               | api/user                              |                                  | Closure                                                                                           | api,auth:api     |
|        | GET|HEAD                               | home                                  | home                             | App\Http\Controllers\HomeController@index                                                         | web,auth         |
|        | POST                                   | login                                 |                                  | App\Http\Controllers\Auth\LoginController@login                                                   | web,guest        |
|        | GET|HEAD                               | login                                 | login                            | App\Http\Controllers\Auth\LoginController@showLoginForm                                           | web,guest        |
|        | POST                                   | logout                                | logout                           | App\Http\Controllers\Auth\LoginController@logout                                                  | web              |
|        | GET|HEAD                               | painel                                |                                  | App\Http\Controllers\PainelController@index                                                       | web,auth         |
|        | POST                                   | painel/events                         | events.store                     | App\Http\Controllers\EventsController@store                                                       | web,auth,level:1 |
|        | GET|HEAD                               | painel/events                         | events.index                     | App\Http\Controllers\EventsController@index                                                       | web,auth,level:1 |
|        | GET|HEAD                               | painel/events/create                  | events.create                    | App\Http\Controllers\EventsController@create                                                      | web,auth,level:1 |
|        | DELETE                                 | painel/events/{event}                 | events.destroy                   | App\Http\Controllers\EventsController@destroy                                                     | web,auth,level:1 |
|        | PUT|PATCH                              | painel/events/{event}                 | events.update                    | App\Http\Controllers\EventsController@update                                                      | web,auth,level:1 |
|        | GET|HEAD                               | painel/events/{event}                 | events.show                      | App\Http\Controllers\EventsController@show                                                        | web,auth,level:1 |
|        | GET|HEAD                               | painel/events/{event}/edit            | events.edit                      | App\Http\Controllers\EventsController@edit                                                        | web,auth,level:1 |
|        | GET|HEAD                               | painel/files                          |                                  | App\Http\Controllers\FileEntriesController@index                                                  | web,auth         |
|        | GET|HEAD                               | painel/files/create                   |                                  | App\Http\Controllers\FileEntriesController@create                                                 | web,auth         |
|        | POST                                   | painel/files/upload-file              |                                  | App\Http\Controllers\FileEntriesController@uploadFile                                             | web,auth         |
|        | GET|HEAD                               | painel/files/{path_file}/{file}       |                                  | Closure                                                                                           | web,auth         |
|        | POST                                   | painel/users                          | users.store                      | App\Http\Controllers\UserController@store                                                         | web,auth,level:1 |
|        | GET|HEAD                               | painel/users                          | users.index                      | App\Http\Controllers\UserController@index                                                         | web,auth,level:1 |
|        | GET|HEAD                               | painel/users/create                   | users.create                     | App\Http\Controllers\UserController@create                                                        | web,auth,level:1 |
|        | DELETE                                 | painel/users/{user}                   | users.destroy                    | App\Http\Controllers\UserController@destroy                                                       | web,auth,level:1 |
|        | PUT|PATCH                              | painel/users/{user}                   | users.update                     | App\Http\Controllers\UserController@update                                                        | web,auth,level:1 |
|        | GET|HEAD                               | painel/users/{user}                   | users.show                       | App\Http\Controllers\UserController@show                                                          | web,auth,level:1 |
|        | GET|HEAD                               | painel/users/{user}/edit              | users.edit                       | App\Http\Controllers\UserController@edit                                                          | web,auth,level:1 |
|        | POST                                   | painel/usuarios                       | usuarios.store                   | App\Http\Controllers\UserRegistrationEventController@store                                        | web,auth,level:0 |
|        | GET|HEAD                               | painel/usuarios                       | usuarios.index                   | App\Http\Controllers\UserRegistrationEventController@index                                        | web,auth,level:1 |
|        | DELETE                                 | painel/usuarios/{id}                  | usuarios.destroy                 | App\Http\Controllers\UserRegistrationEventController@destroy                                      | web,auth,level:0 |
|        | GET|HEAD                               | painel/usuarios/{id}                  | usuarios.subscription            | App\Http\Controllers\UserRegistrationEventController@Subscription                                 | web,auth,level:0 |
|        | POST                                   | password/email                        | password.email                   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail                             | web,guest        |
|        | POST                                   | password/reset                        | password.update                  | App\Http\Controllers\Auth\ResetPasswordController@reset                                           | web,guest        |
|        | GET|HEAD                               | password/reset                        | password.request                 | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm                            | web,guest        |
|        | GET|HEAD                               | password/reset/{token}                | password.reset                   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm                                   | web,guest        |
|        | GET|HEAD                               | register                              | register                         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm                                 | web,guest        |
|        | POST                                   | register                              |                                  | App\Http\Controllers\Auth\RegisterController@register                                             | web,guest        |
+--------+----------------------------------------+---------------------------------------+----------------------------------+---------------------------------------------------------------------------------------------------+-------------------------------------------------+
```
 


## Usage in project 
The Events Project using GuzzleHtpp for comunication with external api made in Spring Boot integration with hibernate and
JPA, with security JWT authentication
* [GuzzleHttp](http://docs.guzzlephp.org/en/stable/)
* [Spring](http://spring.io/projects/spring-boot)
* [JWT Json Web Token Authentication](https://jwt.io/)
* [Laravel Framework](https://laravel.com)


## References
* [Laravel Eloquent Model Conventions](https://laravel.com/docs/5.7/eloquent#eloquent-model-conventions)
* [Laravel Authentication](https://laravel.com/docs/5.7/authentication)
* [Laravel Blade Templates](https://laravel.com/docs/5.7/blade)
* [Guzzle Http Request Options](http://docs.guzzlephp.org/en/stable/request-options.html)
* [Laravel Queues](https://laravel.com/docs/5.7/queues)
* [Laravel Events](https://laravel.com/docs/5.7/events)
* [Laravel Listeners](https://laravel.com/docs/5.7/events#defining-listeners)
* [JWT Quick Starter](https://jwt.io/#libraries)

## License
* The  Events Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
