<?php

namespace App\Console\Commands;

use App\Models\Backend\Notice;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notice:gen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Dummy data in notice';

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
        $request = Request::create(route('notice.gen'), 'GET');
        $response = app()->handle($request);
        $responseBody = $response->getContent();
        $this->info('notice.gen route has been dispatched successfully');
    }
}
