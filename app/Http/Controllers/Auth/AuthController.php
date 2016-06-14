<?php

namespace App\Http\Controllers\Auth;

// ReneVis: 'App\Models\Member' in stead of 'App\User'
use App\Models\Member;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

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
    protected $redirectTo = '/';
    // protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:members', // ReneVis: in stead of: 'unique:users'
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // ReneVis: 'Member::create' in stead of 'User::create'
        return Member::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // ReneVis: this function is a nice to have:
    //          it is called from a URL link in the 'home' view via route 'guest_login'
    public function GuestLogin()
    {
        // $member = Member::find(1);
        $member = Member::where('name', '=', 'guest')->first();
        // Attempt to auto-login this user
        if (Auth::attempt(['email' => $member->email, 'password' => 'welcome'])) {
            // Authentication passed...
            return redirect()->to(url('home'));
        }
    }
}
