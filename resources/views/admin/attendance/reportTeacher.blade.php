@extends('layouts.fixed')

@section('title','Attendance | Monthly Report')

@section('style')
    <style>
        @media (min-width: 992px) {
            #atn_result_show{
                font-size: 13px;
            }
            .table td, th{
                padding: .5rem;
            }
        }
    </style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attendance Monthly Report </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance Monthly Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            {{ Form::open(['action'=>'Backend\AttendanceController@report','method'=>'get','id' => 'changeAction']) }}
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">User</label>
                                        <div class="input-group">
                                            {{ Form::select('user',[1=>'Student',2=>'Employee','Teacher'],null,['class'=>'form-control','id' => 'statusChange','placeholder'=>'Select Session','required']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Year</label>
                                        <div class="input-group">
                                            {{ Form::selectRange('year',2020,2025,null,['class'=>'form-control','placeholder'=>'Session','required']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Month</label>
                                        <div class="input-group">
                                            {{ Form::selectMonth('month',null,['class'=>'form-control','placeholder'=>'Select Month','required']) }}
                                        </div>
                                    </div>
                                    <div class="col" id="forStudent">
                                        <label for="class">Class</label>
                                        <div class="input-group">
                                            <select name="class_id" id="class" class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach($repository->academicClasses() as $class)
                                                    <option value="{{ $class->id }}">{{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-1" style="padding-top: 32px;">
                                        <div class="input-group">
                                            <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{ Form::close() }}

                        </div>
                        <div class="col-md-3">
                            <div>
                                <ul style="list-style: none">
                                    <li> <i class="fas fa-circle" style="color: #008000"></i> <span> P - Present </span></li>
                                    <li> <i class="fas fa-circle" style="color: #00bfff"></i> <span> D - Late/Delay </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ffa500"></i> <span> R - Left without completing the day </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ff0000"></i> <span> A - Absent </span></li>
                                    <li> <i class="fas fa-circle" style="color: #878484"></i> <span> L - Leave </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($students) > 0)
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Month Name :
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="att-table">
                                <table class="table table-bordered table-responsive" id="atn_result_show">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Roll</th>
                                        <th style="padding-left: 10px">Name</th>
                                        @for($i = 1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++)
                                            <th style="padding-left: 10px">{{ $i }}</th>
                                        @endfor
                                    </tr>
                                    </thead>
                                    <tbody id="atn_result_show">
                                    @foreach($students as $student)
                                        <tr>
                                            <th>{{ $student->rank }}</th>
                                            <th>{{ $student->student->name ?? ''}}</th>
                                            @for($i = 1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++)
                                                @if($i < 10)
                                                    @php $i = '0'.$i @endphp
                                                @endif
                                                <td>
                                                    <?php
                                                        $attn = \App\Models\Backend\Attendance::query()
                                                                    ->where('student_academic_id',$student->id)
                                                                    ->where('date','like',Carbon\Carbon::createFromDate($year,$month)->format('Y-m').'-'.$i.'%')
                                                                    ->first();

                                                    ?>
{{--                                                {{ $attn->attendanceStatus->code ?? '' }}--}}
                                                        @if($attn != null)
                                                             @if($attn->attendance_status_id == 1)
                                                                <span style="color:white; background: green" class="badge">P</span>
                                                            @elseif($attn->attendance_status_id == 2)
                                                                <span style="color:white; background: red" class="badge">A</span>
                                                            @elseif($attn->attendance_status_id == 3)
                                                                <span style="color:white; background: #281919" class="badge">L</span>
                                                            @elseif($attn->attendance_status_id == 4)
                                                                <span style="color:white; background: Orange" class="badge">E</span>
                                                            @elseif($attn->attendance_status_id == 5)
                                                                <span style="color:white; background: darkviolet" class="badge">H</span>
                                                            @elseif($attn->attendance_status_id == 6)
                                                                <span style="color:white; background: #5e684f" class="badge">W</span>
                                                            @elseif($attn->attendance_status_id == 7)
                                                                <span style="color:white; background: #878484" class="badge">LA</span>
                                                            @elseif($attn->attendance_status_id == 8)
                                                                <span style="color:white; background: #878484" class="badge">LE</span>
                                                            @endif
                                                        @else
                                                            <span style="color:white; background: #5fbd54" class="badge">-</span>
                                                        @endif
                                                </td>
                                            @endfor
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div ><h4 id="erro-box" style="text-align: center; color:red; display: none" >Attendance Not Found</h4></div>
        </div><!-- /.container-fluid -->
    </section>    <!-- /.content -->
    @endif
@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#resultSearchForm').submit(function (e) {
            e.preventDefault();
            var formData = $( this ).serialize();

            $.ajax({
                url: '{{ url('/admin/get_attendance_monthly') }}',
                data: formData,
                type: 'POST',
                error: function(xhr, ajaxOptions, thrownError) {
                    if(xhr.status==404) {
                        $('#erro-box').css('display','');
                        $("#erro-box").fadeOut(5000);
                    }
                },
                success: function(data) {
                    $("#atn_result_show").html(data);
                    $("#atn_result_show").html(data);

                }

            });

        });




        $('#statusChange').change(function (){
            let statusValue = $(this).val();
            if(statusValue == 3){    // Teacher for 3
                $('#forStudent').hide();
                let action = "{{ action('Backend\AttendanceController@reportTeacher') }}";
                $('#changeAction').attr("action", action);
            }
            if(statusValue == 1){   // Student for 1
                $('#forStudent').show();
               let action = "{{ action('Backend\AttendanceController@report') }}";
                $('#changeAction').attr("action", action);
            }
        })

         let action = "{{ action('Backend\AttendanceController@report') }}";
        $('#changeAction').attr("action", action);













    </script>
@endsection

