<?php


namespace App\Repository;


use App\Models\Backend\Day;

class ScheduleRepository
{
    public function days()
    {
        return Day::all()->pluck('name','id');
    }
}
