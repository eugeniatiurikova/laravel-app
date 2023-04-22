<?php

namespace App\Http\Controllers;

use App\Services\Contract\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social)
    {
        try {
            return redirect(
                $social->loginOrRegisterViaSocialNetwork(Socialite::driver($driver)->user())
            );
        } catch (\Exception) {
            return redirect('/register');
        }
    }
}
