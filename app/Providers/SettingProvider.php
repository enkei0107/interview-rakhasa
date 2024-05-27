<?php

namespace App\Providers;

use App\Models\Setting;
use Config;
use Illuminate\Support\ServiceProvider;
use Schema;

class SettingProvider extends ServiceProvider
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
        if (Schema::hasTable('settings')) {
            $Setting = Setting::all();
            foreach ($Setting as $data) {
                // set config dengan key dan value dati kolom setting
            }
        }
    }
}
