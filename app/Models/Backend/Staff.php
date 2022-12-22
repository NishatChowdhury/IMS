<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable
{
    use HasFactory,Notifiable,HasApiTokens;

    protected $table = 'staffs';

    protected $fillable = ['name','nickname','card_id','shift_id','address','father_husband','mobile','dob','nid','gender_id','blood_group_id','image','email','code','title','role_id','job_type_id','staff_type_id','joining','salary','bonus'];

    public function blood()
    {
        return $this->belongsTo(BloodGroup::class,'blood_group_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
