<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 11/7/2019
 * Time: 12:16 PM
 */

namespace App\Repository;


use App\Models\Backend\AcademicClass;
use App\Models\Backend\AssignSubject;
use App\Models\Backend\BloodGroup;
use App\Models\Backend\BookCategory;
use App\Models\Backend\City;
use App\Models\Backend\Classes;
use App\Models\Backend\Country;
use App\Models\Backend\Division;
use App\Models\Backend\Gender;
use App\Models\Backend\Group;
use App\Models\Backend\Religion;
use App\Models\Backend\Section;
use App\Models\Backend\Session;
use App\Models\Backend\Student;
use App\Models\Backend\Subject;

class StudentRepository
{
    public function sessions()
    {
        return Session::all()
            //->where('active',1)
            ->pluck('year','id');
    }

    public function activeSessions()
    {
        return Session::all()->where('active',1)->pluck('year','id');
    }

    public function names()
    {
        return Student::all()->pluck('name','id');
    }

    public function academicClasses()
    {
        return AcademicClass::query()->whereIn('session_id',activeYear())->get();
    }
    public function academicClassesForForm()
    {
        return AcademicClass::with('classes')->get()->pluck('class_id','id');
        // return AcademicClass::query()->whereIn('session_id',activeYear())->get()->pluck('name','id');
    }
    public function classes()
    {
        return Classes::all()->pluck('name','id');
    }

    public function sections()
    {
        return Section::all()->pluck('name','id');
    }

    public function groups()
    {
        return Group::all()->pluck('name','id');
    }

    public function genders()
    {
        return Gender::all()->pluck('name', 'id');
    }

    public function bloods()
    {
        return BloodGroup::all()->pluck('name', 'id');
    }

    public function divisions()
    {
        return Division::all()->pluck('name', 'id');
    }

    public function cities()
    {
        return City::all()->pluck('name', 'id');
    }

    public function countries()
    {
        return Country::all()->pluck('name', 'id');
    }

    public function religions()
    {
        return Religion::all()->pluck('name','id');
    }

    public function bookCategories(){
        return BookCategory::all()->pluck('book_category','id');
    }


    public function optionals($class)
    {
        $subjects = AssignSubject::query()
            ->where('academic_class_id',$class)
            //->where('is_optional',1)
            ->pluck('subject_id');

        return Subject::query()->whereIn('id',$subjects)->pluck('name','id');
    }
}
