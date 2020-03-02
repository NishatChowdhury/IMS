<?php

use App\ImportantLink;

function isActive($path, $active = 'active menu-open'){
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function siteConfig($col){
    $config = \App\SiteInformation::query()->first();
    return $config->$col;
}

function smsConfig($col){
    $config = \App\CommunicationSetting::query()->first();
    return $config->$col;
}

function socialConfig($col){
    $config = \App\Social::query()->first();
    return $config->$col;
}

function activeYear(){
    $s = \App\Session::query()->where('active',1)->pluck('id');
    return $s;
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
