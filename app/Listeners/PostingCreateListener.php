<?php

namespace App\Listeners;

use App\Events\PostingCreateEvent;
use App\Mail\PostingCreateMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
        Mail::to($event->email)->send(new PostingCreateMail);
    }
}
