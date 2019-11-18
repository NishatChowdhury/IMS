<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['id', 'name', 'code', 'short_name', 'level', 'credit_fee'];

    public function subjects(){
        return $this->hasMany('App\AssignSubject');
    }
}
