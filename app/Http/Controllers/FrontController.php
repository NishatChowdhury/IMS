<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function introduction()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.introduction',compact('content'));
    }

    public function governing_body()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.governing-body',compact('content'));
    }

    public function donor()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.founder-n-donor',compact('content'));
    }
//Institute -> infrastructure ---Start
    public function building_room()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.building-n-room',compact('content'));
    }

    public function library()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.library',compact('content'));
    }

    public function transport()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.transport',compact('content'));
    }

    public function hostel()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.hostel',compact('content'));
    }
//Institute -> infrastructure ---Start

//Institute -> Academic ---START
    public function class_routine()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.class-routine',compact('content'));
    }
    public function calender()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.calender',compact('content'));
    }
    public function syllabus()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.syllabus',compact('content'));
    }
    public function performance()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.performance',compact('content'));
    }
//Institute -> Academic ---END

//TEAM -> --START
    public function managing_committee()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.managing-committee',compact('content'));
    }
    public function teacher()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.teacher',compact('content'));
    }
    public function staff()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.staff',compact('content'));
    }
//TEAM -> --END


//RESULT -> --START
    public function internal_exam()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.internal-exam',compact('content'));
    }
    public function public_exam()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.public-exam',compact('content'));
    }
    public function admission()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.admission',compact('content'));
    }
//RESULT -> --END

//ATTENDANCE -> --START
    public function attendance_summery()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.attendance-summery',compact('content'));
    }
    public function student_attendance()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.student-attendance',compact('content'));
    }
    public function teacher_attendance()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.teacher-attendance',compact('content'));
    }
//ATTENDANCE -> --END

//News & Notice Start...
    public function notice()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.notice',compact('content'));
    }
    public function news()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.news',compact('content'));
    }
//News & Notice END...

//Gallery
    public function gallery()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.gallery',compact('content'));
    }
}
