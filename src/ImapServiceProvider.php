<?php

namespace Topcu\LaravelImap;

use Illuminate\Support\ServiceProvider;

class ImapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("imap", function () {
            return new Mailbox(config("services.imap"));
        });
    }
}
