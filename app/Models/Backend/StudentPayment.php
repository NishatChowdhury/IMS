<?php

namespace App\Models\Backend;

use App\Models\Backend\FeeSetup;
use App\Models\Backend\PaymentMethod;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentPayment extends Model
{
    protected $table = 'student_payments';

    protected $dates = ['date'];

    protected $fillable = ['student_academic_id', 'user_id', 'fee_setup_id', 'date', 'payment_method', 'amount', 'discount', 'remarks'];

    public function fee_categories()
    {
        return $this->belongsToMany(FeeCategory::class, 'payment_pivots')->withPivot('amount');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function payment_methods()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function feeSetup()
    {
        return $this->belongsTo(FeeSetup::class, 'fee_setup_id');
    }

    public function academics()
    {
        return $this->belongsTo(StudentAcademic::class, 'student_academic_id');
    }

    /**
     * A payment is belongs to a method
     *
     * @return BelongsTo
     */
    public function method(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method');
    }
}
