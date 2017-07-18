<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Redirect, Session;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
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
    protected $redirectTo = '/login';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request)
    {
      $this->validate(
          $request,
          $this->getResetValidationRules(),
          $this->getResetValidationMessages(),
          $this->getResetValidationCustomAttributes()
      );

      $credentials = $request->only(
          'email', 'password', 'password_confirmation', 'token'
      );

      $broker = $this->getBroker();

      $response = Password::broker($broker)->reset($credentials, function ($user, $password) {
          $this->resetPassword($user, $password);
      });

      switch ($response) {
          case Password::PASSWORD_RESET:
              Session::flash('message', 'Password Anda telah di Reset, silahkan login!');
              return Redirect::to('login'); //$this->getResetSuccessResponse($response);

          default:
              return $this->getResetFailureResponse($request, $response);
      }
    }

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();

        //Auth::guard($this->getGuard())->login($user);
    }

    protected function getResetValidationRules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }
    protected function getResetValidationMessages()
    {
        return [];
    }
    protected function getResetValidationCustomAttributes()
    {
        return [];
    }
    public function getBroker()
    {
        return property_exists($this, 'broker') ? $this->broker : null;
    }
}
