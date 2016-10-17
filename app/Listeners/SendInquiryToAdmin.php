<?php

namespace App\Listeners;

use App\Events\UserInquiresAboutTheProject;
use App\Mail\ProjectInquiry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendInquiryToAdmin
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
     * @param  UserInquiresAboutTheProject  $event
     * @return void
     */
    public function handle(UserInquiresAboutTheProject $event)
    {
        Mail::to('mark.timbol@hotmail.com')->send(new ProjectInquiry($event->inquiry));
    }
}
