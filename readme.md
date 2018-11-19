

<p align="center">
<a href="https://travis-ci.com/nibri10/EventsProject"><img src="https://travis-ci.com/nibri10/EventsProject.svg?branch=master" alt="Build Status"></a>
</p>

## Events Project

Project Events is a system for event creation and management that is under development and has integration with an external api made in Spring boot protected with json web token (JWT)

## Routes
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
|        | GET|HEAD                               | painel/usuarios                       |                                  | App\Http\Controllers\UserRegistrationEventController@index                                        | web,auth,level:1 |
|        | POST                                   | painel/usuarios                       |                                  | App\Http\Controllers\UserRegistrationEventController@show                                         | web,auth,level:0 |
|        | DELETE                                 | painel/usuarios/{id}                  |                                  | App\Http\Controllers\UserRegistrationEventController@destroy                                      | web,auth,level:0 |
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

## License

The  Events Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
