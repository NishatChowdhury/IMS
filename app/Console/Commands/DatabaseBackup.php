<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
// use Symfony\Component\Process\Process;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';


    protected $process;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Database Backup';

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


        // $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
  
        // $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename;
  
        // $returnVar = NULL;
        // $output  = NULL;
  
        // exec($command, $output, $returnVar);

        $filename = 'backup'.strtotime(now()).'.sql';
        $path = storage_path().'/app/backup/';
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        $command = "mysqldump --user=".env('DB_USERNAME')." --host=".env('DB_HOST')." ".
         env('DB_DATABASE')." > " .$path.$filename;

        exec($command);
    }
}
