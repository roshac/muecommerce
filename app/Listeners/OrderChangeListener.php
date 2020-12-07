<?php

namespace App\Listeners;

use App\Events\OrderChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderChangeListener
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
     * @param  OrderChange  $event
     * @return void
     */
    public function handle(OrderChange $event)
    {
        //
    }
}
