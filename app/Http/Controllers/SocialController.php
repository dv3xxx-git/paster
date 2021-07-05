<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Services\SocialService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\HashService;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function vk()
    {

        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('vkontakte')->user();
        $user_vk = SocialService::socailNet($user);
        if ($user_vk){
            Auth::login($user_vk);
            return redirect()->route('paste');
        }
        return back(400);
    }
}
