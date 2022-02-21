<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class SendSmsVerification
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
     * @param \App\Events\SendSmsVerification $event
     * @return void
     */
    public function handle(\App\Events\SendSmsVerification $event)
    {
//        $trans_code = random_int(10000, 99999);
        $trans_code = 12345;
        $event->user->update([
            'trans_code' => $trans_code
        ]);
//        Smsirlaravel::sendVerification($trans_code, $event->user->mobile);
    }
}
