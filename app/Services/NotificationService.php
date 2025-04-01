<?php

namespace App\Services;

class NotificationService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    function send($message, $recipient) {
         return "Dit is een notificatie naar $recipient met de boodschap: $message";
    }
}
