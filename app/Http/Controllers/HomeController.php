<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function database()
    {
        return view('admin.backup.backup');
    }

    public function downloadDatabase()
    {
        $filename = 'backup'.strtotime(now()).'.sql';
        $downloadFIle = "mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." > " . public_path().'/assets/backup/'.$filename;

        exec($downloadFIle);


        $ds = DIRECTORY_SEPARATOR;

        $host = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');
        
        $ts = time();

        $path = database_path() . $ds . 'backups' . $ds . date('Y', $ts) . $ds . date('m', $ts) . $ds . date('d', $ts) . $ds;
        $file = date('Y-m-d-His', $ts) . '-dump-' . $database . '.sql';
        $command = sprintf('mysqldump -h %s -u %s -p\'%s\' %s > %s', $host, $username, $password, $database, $path . $file);

        // $command = "mysqldump --user=".env('DB_USERNAME')."
        // --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".
        // env('DB_DATABASE')." > " .$path.$filename;


        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        return $path;
    }
    public function downloadDatabase1()
    {
        // dd('ds');

       return Artisan::call('db:backup');
        # code...
    }
}
