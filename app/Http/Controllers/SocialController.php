<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\HashService;

class SocialController extends Controller
{
    public function vk()
    {

        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('vkontakte')->user();

        if (SocialService::socailNet($user)){
            return redirect()->route('home');
        }

        return back(400);
    }
}
