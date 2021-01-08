<?php

use App\Journal;
use App\Session;
use App\ImportantLink;
use Illuminate\Support\Str;

function isActive($path, $active = 'active menu-open'){
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function siteConfig($col){
    $config = \App\SiteInformation::query()->first();
    return $config->$col;
}

function smsConfig($col){
    $config = \App\CommunicationSetting::query()->first();
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

function coa_balance($coa){
    return $coa->journals->where('debit_credit',0)->sum('amount')-$coa->journals->where('debit_credit',1)->sum('amount');
}
/**
 * @param int $capital
 * @param int $income
 * @param int $expense
 * 
 */
function capital_coa_balance($capital, $income, $expense){
    return ($capital + $income - $expense);
}