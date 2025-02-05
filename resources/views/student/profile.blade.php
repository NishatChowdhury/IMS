@extends('layouts.student')

@section('title','Profile')

@section('content')
    @php
        $user = auth()->guard('student')->user();
        $student = $user->student;
    @endphp
    <div class="padding-y-80 bg-cover" data-dark-overlay="6" style="background:url({{ asset('assets/img/breadcrumb-bg.jpg') }}) no-repeat">
        <div class="container">
            <h2 class="text-white">
                {{ __('Students Profile') }}
            </h2>
            <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
                <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ __('Page') }}</a></li>
                <li class="breadcrumb-item">{{ __('Students Profile') }}</li>
            </ol>
        </div>
    </div>

    <section class="paddingTop-50 paddingBottom-100 bg-light">
        <div class="container">
            <div class="row profile">
                <div class="col-lg-4 mt-4">
                    <div class="card shadow-v1">
                        <div class="card-header text-center border-bottom pt-5 mb-4">
                            <img class="rounded-circle mb-4"
                                 src="{{ asset('storage/uploads/students/') }}/{{ $student->image }}" width="200"
                                 height="200" alt="">
                            <h4>
                                {{ auth()->guard('student')->user()->name }}
                            </h4>
                            <p>
                                {{ $student->studentId }} <br>
                                {{ $student->studentAcademic->classes->name }} {{ $student->studentAcademic->group->name ?? '' }} {{ $student->studentAcademic->section->name ?? '' }}
                            </p>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item m-2">
                                    {{--                                    <i class="ti-shopping-cart text-primary"></i>--}}
                                    <span class="d-block">{{ __('Rank') }}</span>
                                    <span class="h6">{{ $student->studentAcademic->rank }}</span>
                                </li>
                                <li class="list-inline-item m-2">
                                    {{--                                    <i class="ti-heart text-primary"></i>--}}
                                    <span class="d-block">{{ __('DOB') }}</span>
                                    <span class="h6">{{ $student->dob}}</span>
                                    {{--                                    <span class="h6">{{ $student->dob ? $student->dob->format('Y-m-d') : '' }}</span>--}}
                                </li>
                            </ul>
                        </div>
                        <div class="card-body border-bottom">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <span class="d-block">{{ __('Email address') }}</span>
                                    <a class="h6" href="mailto:{{ $student->email }}">{{ $student->email }}</a>
                                </li>
                                <li class="mb-3">
                                    <span class="d-block">{{ __('Phone') }}</span>
                                    <a class="h6" href="callto:{{ $student->mobile }}">{{ $student->mobile }}</a>
                                </li>
                                <li class="mb-3">
                                    <span class="d-block">{{ __('Location') }}</span>
                                    <p class="h6">{{ $student->address }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <p>
                                Quick Action:
                            </p>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="btn btn-outline-success iconbox iconbox-sm" id="diary"
                                       data-toggle="modal" data-target="#exampleModal" href="#" title="Diary">
                                        <i class="fas fa-book"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    {{--{{route('classSchedule.view')}}--}}
                                    <a class="btn btn-outline-success iconbox iconbox-sm" id="class-schedule" data-toggle="modal" data-target="#exampleModal" href="#" title="Class Schedule">
                                        <i class="fas fa-clock"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-outline-success iconbox iconbox-sm" id="exam-routine" href="#" data-toggle="modal" data-target="#exampleModal" title="Exam Routine">
                                        <i class="fas fa-calendar-week"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-outline-success iconbox iconbox-sm" id="syllabus" href="#" data-toggle="modal" data-target="#exampleModal" title="Syllabus">
                                        <i class="fas fa-book-reader"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END col-md-4 -->
                <div class="col-lg-8 mt-4">
                    <div class="card padding-30 shadow-v1" id="main-div">
                        <ul class="nav tab-line tab-line border-bottom mb-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#Tabs_1-1" role="tab"
                                   aria-selected="true">
                                    <i class="ti-download mr-1"></i>
                                    {{ __('Attendance') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Tabs_1-2" role="tab" aria-selected="true">
                                    <i class="fas fa-file-contract mr-1"></i>
                                    {{ __('Result') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Tabs_1-3" role="tab" aria-selected="true">
                                    <i class="fas fa-dollar-sign mr-1"></i>
                                    {{ __('Payment') }}
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Tabs_1-1" role="tabpanel">
                                @include('student.profile_attendance')
                            </div>
                            <!-- END tab-pane -->
                            <div class="tab-pane fade exam-data" id="Tabs_1-2" role="tabpanel">
                                @include('student.profile_exam')
                            </div>
                            <!-- END tab-pane -->
                            <div class="tab-pane fade" id="Tabs_1-3" role="tabpanel">
                                <div class="row">
                                    @include('student.profile_payment')
                                </div> <!-- END row-->
                            </div> <!-- END tab-pane -->
                        </div> <!-- END tab-content-->
                    </div> <!-- END card-->
                </div> <!-- END col-md-8 -->
            </div> <!--END row-->
        </div> <!--END container-->
    </section>

    @include('student.modal')
@stop

@section('script')
    <script>
        $(document).ready(function () {

            /**
             * Display marks of an exam
             */
            $('.result-details').click(function () {
                var id = $(this).data('id');
                var token = "{{csrf_token()}}";
                var name = $(this).data('name');
                console.log(name);
                $.ajax({
                    url: "{{ route('student.marks') }}",
                    method: 'POST',
                    data: {_token:token,id:id},
                    beforeSuccess: function(){
                        $("#loader").show();
                    },
                    success: function (res) {
                        $("#loader").hide();
                        $("#exampleModalLabel").text(name);
                        $('#modal-body').html(res);
                    }
                })
            });

            //search attendance
            $('.attn-search').click(function () {
                var month_id = $('#attendance-month').val();
                var year_id = $('#attendance-year').val();
                var token = "{{csrf_token()}}";
                $.ajax({
                    url: '{{ route('student.attendance') }}',
                    method: 'POST',
                    data: {
                        '_token': token,
                        'month_id': month_id,
                        'year_id': year_id,
                    },
                    success: function (res) {
                        $('#attendance_search').html(res);
                    }
                })
            });
            //    end search attendance

            /**
             * Display diary for the current date
             */
            $('#diary').click(function () {
                var token = "{{csrf_token()}}";
                $.ajax({
                    url: "{{ route('student.diary') }}",
                    method: 'POST',
                    data: {
                        '_token': token,
                    },
                    beforeSuccess: function () {
                        $("#loader").show();
                    },
                    success: function (res) {
                        $("#loader").hide();
                        $("#exampleModalLabel").text('Dairy');
                        $('#modal-body').html(res);
                        diarySearch();
                    }
                })
            });

            /**
             * Search the diary with a certain date
             */
            function diarySearch(){
                $("#diary-search").click(function(){
                    var token = "{{csrf_token()}}";
                    var date = $("#date").val();

                    $.ajax({
                        url: "{{ route('student.diary') }}",
                        method: 'POST',
                        data: {
                            '_token': token,date:date,
                        },
                        beforeSuccess: function () {
                            $("#loader").show();
                        },
                        success: function (res) {
                            $("#loader").hide();
                            $("#exampleModalLabel").text('Dairy');
                            $('#modal-body').html(res);
                            diarySearch();
                        }
                    })
                })
            }

            /**
             * Display class schedule of the current student
             */
            $('#class-schedule').click(function () {
                var token = "{{csrf_token()}}";
                $.ajax({
                    url: "{{ route('student.class-schedule') }}",
                    method: 'POST',
                    data: {_token: token},
                    success: function (res) {
                        console.log('class schedule');
                        $("#exampleModalLabel").text('Class Schedule');
                        $('#modal-body').html(res);
                    }
                })
            });

            /**
             * Display exam routine for the student
             */
            $('#exam-routine').click(function () {
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: '{{ route('student.exam-routine') }}',
                    method: 'POST',
                    data: {_token: token,},
                    success: function (res) {
                        $("#exampleModalLabel").text('Exam Routine');
                        $('#modal-body').html(res);
                    }
                })
            });

            /**
             * Display & download syllabus
             */
            $('#syllabus').click(function () {
                var token = "{{csrf_token()}}";
                $.ajax({
                    url: '{{ route('student.syllabus') }}',
                    method: 'POST',
                    data: {_token: token},
                    success: function (res) {
                        $('#modal-body').html(res);
                        $("#exampleModalLabel").text('Syllabus');
                    }
                })
            });
        });
    </script>
@endsection
