@extends('layouts.teacher')

@section('title','Teacher Dashboard')

@section('content')
    <div class="container">
        <div class="row pt-4">

            <div class="col-md-6 col-sm-12 mb-4">
                <div class="items diary">
                    <a href="{{ route('teacher.diary.index') }}">
                        <div class="menu_icon">
                           <i class="fas fa-book-open"></i>
                        </div>

                         <h4 class="menu_title">Diary List</h4>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="items admission">
                    <a href="{{ route('teacher.attendance.view') }}">
                        <div class="menu_icon">
                       <i class="fas fa-users-cog"></i>
                        </div>

                         <h4 class="menu_title">Attendance List</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="items result">
                    <a href="{{ route('teacher.examination.list') }}">
                        <div class="menu_icon">
                      <i class="fas fa-user-graduate"></i>
                        </div>
                        <h4 class="menu_title">Examination List</h4>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="items leave">
                    <a href="{{ route('teacher.leave.student') }}">
                        <div class="menu_icon">
                          <i class="fas fa-calendar-check"></i>
                        </div>
                         <h4 class="menu_title">Leave Management</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop


@section('style')
    <style>
        .items {
    padding: 20px;
    border-radius: 7px;
    text-align: center;
    transition: .5s;
    height: 234px;
}

.menu_icon i {
    font-size: 153px;
    color: #fff;
}

.menu_icon {
    padding: 20px;
}

.items:hover {
    background: #484848;
}
.pay{
    background: #2FAA77;
} .diary{
    background: #85AEFF;
}.admission{
    background: #73887A;
}.result{
    background: #F45C5C;
}.sms{
    background: #0C9029;
}.leave{
    background: #33B49C;
}
 .menu_title {
font-family: system-ui;
    color: #f2f2f2;
    text-decoration: none;
    font-size: 20px;
    position: absolute;
    bottom: 0;
    font-weight: 800;
    background: #8493bf;
    padding: 2px 8px;
    border-radius: 2px;
}
    </style>
@stop

