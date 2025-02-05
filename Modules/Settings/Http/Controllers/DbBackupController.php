<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class DbBackupController extends Controller
{
    public function index()
    {
        $allFiles = Storage::files('db');
        $backups = [];
        // make an array of backup files, with their filesize and creation date
        foreach ($allFiles as $k => $f) {
            // only take the zip files into account
            if (substr($f, -4) == '.sql' && Storage::exists($f)) {
                //$created_at =  Carbon::parse(Storage::lastModified($f));
                // $file_size = Storage::size($f);
                $file_name = substr($f, 3);

                $backups[] = [
                    'file_path' => $f,
                    'file_name' =>  $file_name,
                    'file_size' => $this->bytesToHuman(Storage::size($f)),
                    'created_at' => Carbon::parse(Storage::lastModified($f))->diffForHumans(),
                    'download_link' => route('backup.download',  $file_name),
                ];
            }
        }
        return view('settings::db-backup.index',compact('backups'));
    }

    //download - database
    public function download($file_name)
    {
        return Storage::download('/db/'.$file_name);
    }


    //byToHuman
    private function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    //create-database-backup
    public function createDatabaseBackup(){
        Artisan::call('config:clear');
        Artisan::call('db:backup');
        return redirect()->back();
    }
}
