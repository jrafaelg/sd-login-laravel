<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class clear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo "Clearing all cache...\n";
        echo "Clearing cache...\n";
        Artisan::call('cache:clear');
        echo "Clearing config cache...\n";
        Artisan::call('config:clear');
        echo "Clearing route cache...\n";
        Artisan::call('route:clear');
        echo "Clearing view cache...\n";
        Artisan::call('view:clear');
        echo "Clearing compiled files...\n";
        Artisan::call('clear-compiled');
        echo "Clearing events files...\n";
        Artisan::call('event:clear');
        echo "Clearing optimized files...\n";
        Artisan::call('optimize:clear');
        echo "Clearing all cache done!\n";
    }
}
