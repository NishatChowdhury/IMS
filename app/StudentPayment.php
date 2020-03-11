<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $table ='student_payments';
    protected $fillable =['student_id','class_id','section_id','group_id','session_id','setup_amount','discount','fine','arrears','due','paid_amount','transport','month'];

    public function fee_categories(){
        return $this->belongsToMany(FeeCategory::class,'payment_pivots')->withPivot('amount');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }
}
