<?php

namespace App\Listeners;

use App\Events\Bidchange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BidChangeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Bidchange  $event
     * @return void
     */
    public function handle(Bidchange $event)
    {
        //
    }
}
