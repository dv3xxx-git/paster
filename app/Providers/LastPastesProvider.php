<?php

namespace App\Providers;

use App\Models\Paste;
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
            ->paginate(10);
            $view->with(['last_paste' => $last_paste]);
        });
    }
}
