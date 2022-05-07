<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->call('view:clear');
        $this->call('route:clear');
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('clear-compiled');
        $this->call('optimize');
        $this->call('route:cache');
        $this->call('config:cache');
        $this->call('view:cache');

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('asdfasdf');
        $user->role = 'admin';
        $user->save();
        return 0;
    }
}
