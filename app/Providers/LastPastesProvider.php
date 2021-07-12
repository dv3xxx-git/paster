<?php

namespace App\Providers;

use App\Models\Paste;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

class LastPastesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        FacadesView::composer('last_paste', function ($view) {
            $last_paste = Paste::whereAcceptTimer(0)->whereAcceptPublic(0)
                ->orderByRaw('created_at DESC')
                ->get();

            $view->with([
                'last_paste' => $last_paste,
            ]);
        });

        FacadesView::composer('last_paste', function ($view) {
            $auth_user = Auth::user();

            if ($auth_user) {
                $user_pastes = Paste::whereUserId($auth_user->id)
                    ->whereAcceptTimer(0)
                    ->whereAcceptPublic(0)
                    ->orWhere('accept_public', 2)->get()
                    ->take(10);

                $view->with([
                    'user_pastes' => $user_pastes,
                ]);
            }
        });
    }
}
