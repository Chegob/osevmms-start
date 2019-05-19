<?php

namespace App\Console\Commands;

use App\Branch;
use Illuminate\Console\Command;

class AddBranchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:branch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new branch';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $branch = Branch::create([
            'name' => 'Head Office',
            'phone' => '011-466-2512',
        ]);
        
        $this->info('Added: '. $branch->name);
    }
}
