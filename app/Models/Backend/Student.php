<?php

namespace App\Models\Backend;

use App\Models\Backend\FeeSetupStudent;
use App\Models\LocationStudent;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory,Notifiable,HasApiTokens;

    protected $fillable = [
        'name',
        'name_bn',
        'studentId',
        'gender_id',
        'location_id',
        'mobile',
        'dob',
        'birth_certificate',
        'blood_group_id',
        'religion_id',
        'nationality',
        'disability',
        'freedom_fighter',
        'image',
        'address',
        'area',
        'zip',
        'city_id',
        'country_id',
        'email',
        'status',

    ];



    // public function academicClass()
    // {
    //     return $this->belongsTo(AcademicClass::class, 'academic_class_id');
    // }

    /**
     * A student is belongs to a session
     *
     * @return BelongsTo
     */

    // public function classes(): BelongsTo
    // {
    //     return $this->belongsTo(Classes::class);
    // }

    // public function section()
    // {
    //     return $this->belongsTo(Section::class);
    // }

    /**
     * A student is belongs to a session
     *
     * @return BelongsTo
     */
    // public function sessions(): BelongsTo
    // {
    //     return $this->belongsTo(Session::class, 'session_id');
    // }

    // public function group()
    // {
    //     return $this->belongsTo(Group::class);
    // }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function payable($id)
    {
        return StudentPayment::query()->where('student_id', $id)->sum('setup_amount');
    }

    public function paid($id)
    {
        return StudentPayment::query()->where('student_id', $id)->sum('paid_amount');
    }

    public function fine($id)
    {
        return StudentPayment::query()->where('student_id', $id)->sum('fine');
    }

    public function discount($id)
    {
        return StudentPayment::query()->where('student_id', $id)->sum('discount');
    }

    public function admission()
    {
        return $this->belongsTo(AppliedStudent::class, 'ssc_roll', 'ssc_roll');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }

    public function attendances()
    {
        return $this->hasMany(RawAttendance::class, 'registration_id', 'studentId');
    }

    public function feeSetup()
    {
        return $this->hasMany(FeeSetup::class);
    }

    /**
     * A student has many fee setup students
     */
    public function feeSetupStudents()
    {
        return $this->hasMany(FeeSetupStudent::class,'student_id','id');
    }


    /**
     * A student has many fee setup pivot
     *
     * @return HasManyThrough
     */
    public function fee_setup_pivot(): HasManyThrough
    {
        return $this->hasManyThrough(FeeSetupPivot::class, FeeSetup::class);
    }

    /**
     * A student is belongs to a blood group
     *
     * @return BelongsTo
     */
    public function bloodGroup(): BelongsTo
    {
        return $this->belongsTo(BloodGroup::class);
    }

    public function academicClasses()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function father()
    {
        return $this->hasOne(Father::class);
    }

    public function mother()
    {
        return $this->hasOne(Mother::class);
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class);
    }

    /**
     * Student's academic information
     * A student has many academics
     *
     * @return HasMany
     *
     */

    public function academics(): HasMany
    {
        return $this->hasMany(StudentAcademic::class)->latest();
    }

    /**
     * Display class of a specific student
     *
     * @return HasOne
     */
    public function studentAcademic(): HasOne
    {
        return $this->hasOne(StudentAcademic::class,'student_id','id')->latest();
    }

    public function studentAcademicInfo()
    {
        return $this->belongsTo(StudentAcademic::class,'student_id','id');
    }

    public function payments(){
        return $this->hasMany(StudentPayment::class);
    }

    public function studentSubject(){
        return $this->belongsTo(StudentSubject::class);
    }
    public function assignSubjects(){
        return $this->hasMany(StudentSubject::class);
    }

}
