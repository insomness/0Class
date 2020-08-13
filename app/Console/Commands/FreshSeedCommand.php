<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FreshSeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:fseed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'running command refresh and seeding data to tables';

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
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->info('Data has been re-Seed');
    }
}
