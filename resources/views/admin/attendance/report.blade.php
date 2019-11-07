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
@endsection
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
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            {{  Form::open(['id'=>'resultSearchForm']) }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('user','User',['class'=>'control-label']) }}
                                        {{ Form::select('user', ['1' => 'Student', '2' => 'Teacher'], null, ['placeholder' => 'Select User...','class'=>'form-control select2']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('month','Month',['class'=>'control-label']) }}
                                        {{ Form::selectMonth('month',null,['class'=>'form-control select2','id'=>'month']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('year','Year',['class'=>'control-label']) }}
                                        {{ Form::selectRange('year',\Carbon\Carbon::now()->format('Y'),2018,null,['class'=>'form-control','id'=>'year']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('class','Class',['class'=>'control-label']) }}
                                        {{ Form::select('class', ['12' => 'Six', '11' => 'Seven'], null, ['placeholder' => 'Select Class Name...','class'=>'form-control select2']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('group','Group',['class'=>'control-label']) }}
                                        {{ Form::select('group', ['1' => 'Science', '2' => 'Business'], null, ['placeholder' => 'Select Class Group...','class'=>'form-control select2']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('section','Section',['class'=>'control-label']) }}
                                        {{ Form::select('section', ['6' => 'A', '2' => 'B'], null, ['placeholder' => 'Select Class Section...','class'=>'form-control select2']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::submit('Generate',['class'=>'btn btn-success float-md-right']) }}
                                </div>
                            </div>

                            {{ Form::close() }}

                        </div>
                        <div class="col-md-3">
                            <div>
                                <ul style="list-style: none">
                                    <li> <i class="fas fa-circle" style="color: #008000"></i> <span> P - Present </span></li>
                                    <li> <i class="fas fa-circle" style="color: #00bfff"></i> <span> L - Late </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ffa500"></i> <span> R - Left without completing the day </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ff0000"></i> <span> A - Absent </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

                                </table>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div ><h4 id="erro-box" style="text-align: center; color:red; display: none" >Attendance Not Found</h4></div>
        </div><!-- /.container-fluid -->
    </section>    <!-- /.content -->
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
                url: '{{ url('/get_attendance_monthly') }}',
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
    </script>
@endsection

