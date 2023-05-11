@extends('layouts.teacher')

@section('title','Teacher Dashboard')

@section('content')

    <div class="">
        <!-- Content Wrapper. Contains page content -->
        <section class="content">
            <div class="col-md-12">
                <div class="row">
                    <!-- Item-1 -->
                    <div class="col-md-3 d-flex justify-content-center diary">
                        <a href="{{ route('teacher.diary.index') }}">
                            <div class="bx">
                                <div class="icon">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <div class="boxText"><p><b>Diary</b></p></div>
                            </div>
                        </a>
                    </div>
                    <!-- Item-2 -->
                    <div class="col-md-3 d-flex justify-content-center admission">
                        <a href="{{ route('teacher.attendance.view') }}">
                            <div class="bx">
                                <div class="icon">
                                    <i class="fas fa-users-cog"></i>
                                </div>
                                <div class="boxText"><p><b>Attendance</b></p></div>
                            </div>
                        </a>
                    </div>
                    <!-- Item-3 -->
                    <div class="col-md-3 d-flex justify-content-center result">
                        <a href="{{ route('teacher.examination.list') }}">
                            <div class="bx">
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="boxText"><p><b>Examination</b></p></div>
                            </div>
                        </a>
                    </div>
                    <!-- Item-4 -->
                    <div class="col-md-3 d-flex justify-content-center leave">
                        <a href="{{ route('teacher.leave.student') }}">
                            <div class="bx">
                                <div class="icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <div class="boxText"><p><b>Leave</b></p></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content-wrapper -->
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

/* grid dashboard */
        .bx {
            text-align: center;
            border-radius: 14px;
            display: inline-block;
            justify-content: center;
            align-items: center;
            transition: .5s;
            padding: 0 4rem;
        }

        .bx:hover {
        /background-color: #25252d;/
        opacity: .3;
        }

        .torquise {
            background-color: #1abc9c;
            cursor: pointer;
        }

        .emerald {
            background-color: #2ecc71;
            cursor: pointer;
        }

        .peter-river {
            background-color: #3498db;
            cursor: pointer;
        }

        .amethyst {
            background-color: #9b59b6;
            cursor: pointer;
        }

        .wet-asphalt {
            background-color: #34495e;
            cursor: pointer;
        }

        .sun-flower {
            background-color: #f1c40f;
            cursor: pointer;
        }
        .carrot {
            background-color: #e67e22;
            cursor: pointer;
        }
        .alizarin {
            background-color: #e74c3c;
            cursor: pointer;
        }

        .city-light {
            background-color: #075f84;
            cursor: pointer;
        }

        .concrete {
            background-color: #95a5a6;
            cursor: pointer;
        }

        .fusion-red{
            background-color: #fc5c65;
            cursor: pointer;
        }

        .bx .icon {
            font-size: 65px;
        }

        .icon i {
            color: white;
        }

        .boxText {
            color: white;
        }

        @media (min-width: 320px) and (max-width: 480px) {
            .bx{
                width: 450px;
                height: 250px;
                text-align: center;
                border-radius: 14px;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: .5s;
                margin-left: 30px;
                margin-top: 10px;
            }
        }
    </style>
@stop

