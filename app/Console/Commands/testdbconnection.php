<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testdbconnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testdbconnection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try { 
            DB::connection()->getPDO(); 
            dump('Database is connected. Database Name is : ' . DB::connection()->getDatabaseName()); 
         } catch (Exception $e) { 
            dump('Database connection failed'); 
         } 
    }
}
