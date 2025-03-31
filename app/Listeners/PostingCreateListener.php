<?php

namespace App\Listeners;

use App\Events\PostingCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostingCreateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostingCreateEvent $event): void
    {
       dd("Call from LISTENER");
    }
}
