<?php

namespace App\Providers;

use App\Providers\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreUserLoginHistory
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
     * @param  LoginHistory  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        
    }
}
