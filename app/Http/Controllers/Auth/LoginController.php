<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback(string $driver)
    {
        $user = Socialite::driver($driver)->user();
        dd($socialUser);
    }
}
