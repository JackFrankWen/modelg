<?php

namespace App\Listeners;

use App\Models\userlogin_record;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;


class LogSuccessfulLogin
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
     * Record User information when user log succed.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $log  = new userlogin_record;
        $log->user_name = $user->name;
        $log->user_email = $user->email;
        $log->user_ip = Request::Ip();
        $log->login_at =  \Carbon\Carbon::now()->toDateTimeString();

        $log->save();


    }
}
