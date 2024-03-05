<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendDailyEmailDigest extends Command
{
 

    protected $signature = 'email:send-daily-digest';

    protected $description = 'Send daily email digest to users';
   
      public function handle()
    {
      
        \Log::info("today notification has been send to user");
   
    }
}
