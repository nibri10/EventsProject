<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/sistema';
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Check either username or email.
     * @return string
     */
    public function username()
    {
        $authentication  = request()->get('authentication');
        $fieldName = filter_var($authentication, FILTER_VALIDATE_EMAIL) ? 'email' : 'ra';
        request()->merge([$fieldName => $authentication]);
        return $fieldName;
    }
    /**
     * Validate the user login.
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'authentication' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'authentication.required' => 'Ra ou email é obrigatorio',
                'password.required' => 'Senha é obrigatorio',
            ]
        );
    }
    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->put('login_error', trans('auth.failed'));
        throw ValidationException::withMessages(
            [
                'error' => [trans('auth.failed')],
            ]
        );
    }
}