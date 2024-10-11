<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class DeletePendingUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-pending';

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
        //
        // Delete users with pending status
        $deleted = User::where('status', 'pending')->delete();

        // Output the result
        $this->info("Deleted {$deleted} users with pending status.");
    }
}
