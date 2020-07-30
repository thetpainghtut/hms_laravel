<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Link_structure;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $settings = Link_structure::where('status',0)->get();
            $view->with('settings', $settings);

            $customs = Link_structure::where('status',1)->get();
            $view->with('customs', $customs);
        });

        Schema::defaultStringLength(191);

        JsonResource::withoutWrapping();
    }
}
