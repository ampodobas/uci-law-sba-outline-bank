<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}
	
	/**
 * Reset the given user's password.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function postReset(Request $request)
{
    $credentials = $request->only(
        'email', 'password', 'password_confirmation'
    );

    $response = Password::reset($credentials, function ($user, $password) {
        $this->resetPassword($user, $password);
    });

    switch ($response) {
        case Password::PASSWORD_RESET:
            return redirect($this->redirectPath());

        default:
            return redirect()->back()
                        ->withInput($request->only('email'))
                        ->withErrors(['email' => trans($response)]);
    }
}

}
