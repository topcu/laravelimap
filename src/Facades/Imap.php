<?php

namespace Topcu\LaravelImap\Facades;

use Illuminate\Support\Facades\Facade;
use Topcu\LaravelImap\Mailbox;

class Imap extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return "Topcu\\LaravelImap\\Mailbox"; }
}