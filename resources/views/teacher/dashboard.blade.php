@extends('layouts.teacher')

@section('title','Teacher Dashboard')

@section('content')
    <div class="container">
        <div class="row pt-4">
            <div class="col-4">
                <div class="items pay">
                    <a href="">
                        <div class="menu_icon">
                          <i class="fas fa-coins"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="items diary">
                    <a href="{{ route('teacher.diary.index') }}">
                        <div class="menu_icon">
                           <i class="fas fa-book-open"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="items admission">
                    <a href="{{ route('teacher.attendance.view') }}">
                        <div class="menu_icon">
                       <i class="fas fa-users-cog"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4">
                <div class="items result">
                    <a href="{{ route('teacher.examination.list') }}">
                        <div class="menu_icon">
                      <i class="fas fa-user-graduate"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="items sms">
                    <a href="">
                        <div class="menu_icon">
                           <i class="fas fa-sms"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="items leave">
                    <a href="{{ route('teacher.leave.student') }}">
                        <div class="menu_icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
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
    </style>
@stop

