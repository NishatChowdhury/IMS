<?php

use App\Models\Backend\AttendanceStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedAttendanceStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_statuses', function (Blueprint $table) {
            $data = [
                ['name'=>'Present','code'=>'P'],
                ['name'=>'Absent','code'=>'A'],
                ['name'=>'Late','code'=>'D'],
                ['name'=>'Early Leave','code'=>'E'],
                ['name'=>'Holiday','code'=>'H'],
                ['name'=>'Weekly Off','code'=>'W'],
                ['name'=>'Leave','code'=>'L'],
                ['name'=>'Late & Early Leave','code'=>'E'],
            ];

            foreach ($data as $d){
                AttendanceStatus::query()->create($d);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendance_statuses', function (Blueprint $table) {
            //
        });
    }
}
