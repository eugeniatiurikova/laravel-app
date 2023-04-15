<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contract\Social;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{
    public function loginOrRegisterViaSocialNetwork(SocialUser $socialUser): string
    {
//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();
        $user = User::where('email','=',$socialUser->getEmail())->first();
        if($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account');
            }
        } else {
            return route('register');
        }
        throw new Exception('User with this email not found');
    }
}
