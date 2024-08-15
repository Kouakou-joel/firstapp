<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Ici, vous pouvez définir les canaux de diffusion si nécessaire.
         * Un fichier channel.php est souvent utilisé pour cela.
         */
        require base_path('routes/channels.php');
    }
}
