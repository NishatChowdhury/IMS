<?php

namespace App\Console\Commands;

use App\Models\Backend\AcademicClass;
use App\Models\Diary;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

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
            $classes = AcademicClass::query()->with('subjects')->get();
            $today = today();
            foreach ($classes as $class){
                $subjects = $class->subjects;
                foreach ($subjects as $subject){
                    $data = [
                        'academic_class_id' => $class->id,
                        'date' => $today,
                        'teacher_id' => rand(1,20),
                        'subject_id' => $subject->subject_id,
                        'description' => Str::random(100),
                    ];
                    $diary = Diary::query()
                        ->where('subject_id',$subject->subject_id)
                        ->where('date',$today)
                        ->first();

                    if($diary){
                        $diary->update($data);
                    }else{
                        Diary::query()->create($data);
                    }
                }
            }
            $this->info('Random Generate Successfully');
        } catch(Exception $e) {
            $this->info('Message: ' .$e->getMessage());
        }


    }
}
