<?php

use App\CommunicationSetting;
use App\HolidayDuration;
use App\Journal;
use App\Menu;
use App\RawAttendance;
use App\Session;
use App\ImportantLink;
use App\Shift;
use App\SiteInformation;
use App\Theme;
use App\weeklyOff;
use Carbon\Carbon;
use Illuminate\Support\Str;

function isActive($path, $active = 'active menu-open'){
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function siteConfig($col){
    $config = SiteInformation::query()->first();
    return $config->$col;
}

function smsConfig($col){
    $config = CommunicationSetting::query()->first();
    return $config ? $config->$col : false;
}

function socialConfig($col){
    $config = \App\Social::query()->first();
    return $config->$col;
}

function activeYear(){
    return Session::query()->where('active',1)->pluck('id');
}

function importantLinks(){
    return ImportantLink::all();
}

function academicClass($id){
    $academicClass = \App\AcademicClass::query()->findOrFail($id);
    $className = $academicClass->academicClasses->name ?? '';
    $section = $academicClass->section->name ?? '';
    $group = $academicClass->group->name ?? '';
    return $className.' '.$section.$group;
}

function journal_no(){
  return Journal::latest()->first() ? Str::padLeft(Journal::latest()->first()->journal_no + 1, 5, '0') : Str::padLeft(1,5,'0');
}

function dateToRead($date){
    return date('d-m-yy', strtotime($date));
}
function inWord($number){
    $f = new NumberFormatter("en",NumberFormatter::SPELLOUT);
    return $f->format($number);
}

function minTime($studentId,$date){
    $a = RawAttendance::query()
        ->where('registration_id',$studentId)
        ->where('access_date','like','%'.$date.'%')
        ->get();

    if($a->count() > 0){
        $t = $a->min('access_date')->format('H:i:s');
    }else{
        $t = $a->min('access_date');
    }

    return $t;
}

function maxTime($studentId,$date){
    $a = RawAttendance::query()
        ->where('registration_id',$studentId)
        ->where('access_date','like','%'.$date.'%')
        ->get();

    if($a->count() > 0){
        $t = $a->max('access_date')->format('H:i:s');
    }else{
        $t = $a->max('access_date');
    }

    return $t;
}

/**
 * Display menus in front end
 */
function menus(){
    $menus = Menu::query()->where('menu_id',null)->orderBy('order')->get();
    return $menus;
}

function isMenu(): bool
{
    return true;
}

/** Get current theme id */
function theme(){
    $setting = SiteInformation::query()->first();
    return $setting->theme_id;
}

/** Get current theme */
function themeConfig($col){
    $setting = SiteInformation::query()->first();
    $config = Theme::query()->findOrFail($setting->theme_id);
    return $config->$col;
}
