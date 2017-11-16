<?php namespace Dexel\Follow\Console\Commands;

use Illuminate\Console\Command;

/**
 * The FollowCommand class.
 *
 * @package Dexel\Follow
 * @author  Manikandan R <mani@dexeldesigns.com>
 */
class FollowCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dexel:follow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Dexel\Follow package';

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
        $this->info('Welcome to command for Dexel\Follow package');
    }
}
