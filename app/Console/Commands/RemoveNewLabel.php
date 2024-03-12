<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemoveNewLabel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-new-label';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove "new" label from posts older than 3 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Post::where('is_new', true)
            ->whereDate('created_at', '<=', Carbon::now()->subDays(3)->toDateString())
            ->update(['is_new' => false]);

        $this->info('Labels removed successfully.');
    }
}
