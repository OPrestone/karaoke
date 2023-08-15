<?php

namespace App\Console\Commands;

use App\Models\Song;
use Illuminate\Console\Command;

class VoiceRemover extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voice:remover';

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
        $songs  = Song::get();
        foreach($songs as $song)
        {
            shell_exec('python3 shell.py --name='.$song->name);
        }
        return 0;
    }
}
