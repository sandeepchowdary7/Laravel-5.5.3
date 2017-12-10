<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Album Names Saved Successfully';

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
        $albums = [];
        foreach(glob('C:\Users\konas\Desktop\deepu/*') as $doc)
            {   
                 $filename = basename($doc); 
                 // To Remove file extension
                 $filename = preg_replace("/\.[^.]+$/", "", $filename);
                 
                  $albums[] = [ 'name' => $filename ];
            }
            if(DB::table('albums')->where('name', '=', $albums)->first()){ 
                return 'Album name is already in DB';
            } else {
               DB::table('albums')->insert($albums);
               return 'saved'; 
            } 
    }
}

