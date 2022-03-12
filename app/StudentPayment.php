<?php

namespace App;

use App\FeeSetup;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $table ='student_payments';

    protected $fillable =['student_id','user_id','fee_setup_id','date','payment_method','amount'];

    public function fee_categories(){
        return $this->belongsToMany(FeeCategory::class,'payment_pivots')->withPivot('amount');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
   
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }
}
