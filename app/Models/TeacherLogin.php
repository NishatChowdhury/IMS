<?php

namespace App\Models;

use App\Models\Backend\Staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TeacherLogin extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
protected $fillable = [
        'name', 'card_no', 'staff_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $redirectTo = 'teacher.login';

    /**
     * A User is belongs to a student
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Staff::class);
    }

}
