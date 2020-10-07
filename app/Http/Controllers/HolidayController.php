<?php

namespace App\Http\Controllers;

use App\Holiday;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Object_;

class HolidayController extends Controller
{
    public function index()
    {
        $holiday = Holiday::query()->paginate(25);
        return view('admin.attendance.holiday',compact('holiday'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required_without:start'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $start = $request->get('start');
        $end = $request->get('end');

//        if($start XOR $end){
//            dd('one');
//        }
//
//        dd('wrong');

        $period = CarbonPeriod::create($start,$end);

        $holiday = Holiday::query()->create($request->only('name'));

        // Iterate over the period
        foreach ($period as $date) {
            $d = $date->format('Y-m-d');
            DB::table('holiday_durations')->insert(
                [
                    'holiday_id' => $holiday->id,
                    'date' => $d,
                ]
            );
        }

        return redirect()->back();
    }
}
