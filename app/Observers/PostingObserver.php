<?php

namespace App\Observers;

use App\Mail\PostingCreateMail;
use App\Models\Posting;
use Illuminate\Support\Facades\Mail;

class PostingObserver
{
    /**
     * Handle the Posting "created" event.
     */
    public function created(Posting $posting): void
    {
        Mail::to('test@gmail.com')->send(new PostingCreateMail);
    }

    /**
     * Handle the Posting "updated" event.
     */
    public function updated(Posting $posting): void
    {
        //
    }

    /**
     * Handle the Posting "deleted" event.
     */
    public function deleted(Posting $posting): void
    {
        //
    }

    /**
     * Handle the Posting "restored" event.
     */
    public function restored(Posting $posting): void
    {
        //
    }

    /**
     * Handle the Posting "force deleted" event.
     */
    public function forceDeleted(Posting $posting): void
    {
        //
    }
}
