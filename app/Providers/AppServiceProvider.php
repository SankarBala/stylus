<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\Paginator;


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
        Response::macro('attachment', function ($content) {

            $headers = [
                'Content-type'        => 'text/css',
                'Content-Disposition' => 'attachment; filename="download.user.css"',
            ];
        
            return Response::make($content, 200, $headers);
        
        });

        Paginator::useBootstrap();
    }
}
