<?php

namespace App\Console\Commands;

use App\Models\Backend\AcademicClass;
use App\Models\Backend\AssignSubject;
use App\Models\Backend\Subject;
use App\Models\Diary;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DiaryGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:diary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Diary Per Days';

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
        try {
            for ($i = 1; $i < 10; $i++){
                $subjects = AssignSubject::query()->where('academic_class_id', 1)->inRandomOrder()->first();
                Diary::create([
                    'academic_class_id' => 1,
                    'date' => carbon::now()->format('Y-m-d'),
                    'teacher_id' => $subjects->teacher_id[0] ?? 0,
                    'subject_id' => $subjects->subject_id,
                    'description' => 'Description From Random Generate',

                ]);
            }
            $this->info('Random Generate Successfully');
        } catch(Exception $e) {

            $this->info('Message: ' .$e->getMessage());
        }


    }
}
