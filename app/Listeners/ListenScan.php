<?php

namespace App\Listeners;

use App\Events\QRScanned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListenScan
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
     * @param  QRScanned  $event
     * @return void
     */
    public function handle(QRScanned $event)
    {
        //
    }
}
