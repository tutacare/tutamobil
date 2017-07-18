<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator, Auth, Mail, Config;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Input, Session, Redirect, Socialite;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }


            $authUser = $this->findOrCreateUser($user);

            Auth::login($authUser, true);

            return Redirect::to('/dashboard');
    }


    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($authUser){
            return $authUser;
        }

        if($facebookUser->getEmail())
        {
          $email = $facebookUser->getEmail();
        } else {
          $email = $facebookUser->getId() . '@facebook.com';
        }

        $find_email = User::where('email', $email)->first();

        if ($find_email){
            return $find_email->update(['facebook_id' => $facebookUser->getId()]);
        } else {
            return User::create([
                'name' => $facebookUser->getName(),
                'email' => $email,
                'username' => $facebookUser->getId(),
                'phone' => '-',
                'facebook_id' => $facebookUser->getId(),
                'foto' => $facebookUser->getAvatar()
            ]);
        }
    }

    protected function validator(array $data)
    {
        $messages = [
          'g-recaptcha-response.required' => 'Kode Keamanan harus diisi!',
          'name.required' => 'Nama tidak boleh kosong',
          'email.required' => 'Email tidak boleh kosong',
          'email.email' => 'Email harus benar',
          'username.required' => 'Username tidak boleh kosong',
          'password.required' => 'Password tidak boleh kosong',
          'password.min' => 'Minimal password 6 karakter',
          'phone.required' => 'No. Telp tidak boleh kosong'
        ];
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:3|max:20|alpha_dash|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      $recaptcha = new \ReCaptcha\ReCaptcha(Config::get('recaptcha.recaptcha_secret_key'));
      $resp = $recaptcha->verify(Input::get('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
      if ($resp->isSuccess())
      {
        $confirmation_code = uniqid('TUTA') . str_random(30);
        $save = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => $confirmation_code
        ]);
        Mail::later(10, 'email.verify', ['confirmation_code' => $confirmation_code, 'save' => $save], function($m) use ($save) {
              $m->to($save->email, $save->name)
                  ->subject('Konfirmasi alamat email anda');
          });
        return $save;
        }
        else
        {
            //$errors = $resp->getErrorCodes();
            Session::flash('message', 'Kode Keamanan Salah');
            return Redirect::to('register');
        }
    }
    public function postRegister(Request $request) {
      $validator = $this->validator($request->all());

      if ($validator->fails())
      {
          $this->throwValidationException(
              $request, $validator
          );
      }

      //$this->auth->login($this->registrar->create($request->all()));
       $this->create($request->all());
       Session::flash('message', 'Terima kasih telah mendaftar! Silahkan cek email anda untuk konfirmasi.');
       return Redirect::to('login');
    }

    public function postLogin(Request $request)
  {
    $rules = [
          'email' => 'required|exists:users',
          'password' => 'required'
      ];

    $input = Input::only('email', 'password');
    //$input = array('email' => $request->email, 'password' => bcrypt($request->password));

      $validator = Validator::make($input, $rules);

      if($validator->fails())
      {
          return Redirect::to('login')->withInput()->withErrors($validator);
      }

      $credentials = [
          'email' => Input::get('email'),
          'password' => Input::get('password'),
          'confirmed' => 1
      ];

      if ( ! Auth::attempt($credentials))
      {
        $confirm = User::where('email',Input::get('email'))->first();
        if($confirm->confirmed == 0)
        {
        //Session::flash('email', Input::get('email'));
        Session::flash('alert-class', 'alert-danger');
        Session::flash('message', 'Email belum di konfirmasi, Silahkan cek email anda!');
        Session::flash('email', Input::get('email'));
        return Redirect::to('login');
        } else {
          Session::flash('alert-class', 'alert-danger');
          Session::flash('message', 'Password Anda Salah!');
          return Redirect::to('login');
        }
      }

      return Redirect::to('dashboard');
  }

  public function confirm($confirmation_code)
    {
        if(!$confirmation_code)
        {
            return "link tidak terdaftar";
        }

        $user = User::where('confirmation_code', $confirmation_code)->first();

        if (!$user)
        {
            return "link tidak terdaftar";
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Session::flash('message', 'Akun anda telah berhasil di verifikasi, silahkan login!');

        return Redirect::to('login');
    }

    public function postCodeConfirm(Request $request)
      {
          $user = User::where('email', $request->email)->first();
          $confirmation_code = uniqid('TUTA') . str_random(30);
          $user->confirmation_code = $confirmation_code;
          $user->save();
          Mail::later(10, 'email.verify', ['confirmation_code' => $confirmation_code, 'users', $user], function($m) use ($user) {
                $m->to($user->email, $user->name)
                    ->subject('Konfirmasi alamat email anda');
            });
            Session::flash('message', 'Kode konfirmasi telah dikirim! Silahkan cek email anda untuk konfirmasi.');
            return Redirect::to('login');
      }
}
