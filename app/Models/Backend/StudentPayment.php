<?php

namespace App\Models\Backend;

use App\FeeSetup;
use App\PaymentMethod;

use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $table ='student_payments';

    protected $dates = ['date'];

    protected $fillable =['student_id','user_id','fee_setup_id','date','payment_method','amount'];

    public function fee_categories(){
        return $this->belongsToMany(FeeCategory::class,'payment_pivots')->withPivot('amount');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function payment_methods(){
        return $this->belongsTo(PaymentMethod::class,'payment_method','id');
    }
   
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }

    public function feeSetup()
    {
        return $this->belongsTo(FeeSetup::class,'fee_setup_id');
    }
    

   
}
