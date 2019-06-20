<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SyncPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:sync-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '同步文章全文索引';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $exitCode = Artisan::call('scout:import', [
            'model' => 'App\Models\Post'
        ]);
        if ($exitCode == 0) {
            $this->info('同步全文索引成功！');
        } else {
            $this->error('同步全文索引失败！');
        }
    }
}
