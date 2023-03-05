@extends('admission::layouts.master')

@section('title','Online Admission')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Online Admission') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Admission') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Create') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="">
                                        <button type="button" onclick="createOnlineType()"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-plus-circle"></i>
                                            {{ __('New') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('Admission Type') }}</th>
                                    <th>{{ __('Session') }}</th>
                                    <th>{{ __('Class') }}</th>
                                    <th>{{ __('Group') }}</th>
                                    <th>{{ __('Start') }}</th>
                                    <th>{{ __('End') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($onlineAdmissions as $onlineAdmission)
                                    <tr>
                                        <td>{{ $onlineAdmission->type == 1 ? __('School') : __('College') }}</td>
                                        <td>{{ $onlineAdmission->sections ? $onlineAdmission->sessions->year : __('N/A') }}</td>
                                        <td>{{ $onlineAdmission->class_id ? $onlineAdmission->classes->name : __('N/A') }}</td>
                                        <td>{{ $onlineAdmission->group ? $onlineAdmission->group->name : __('N/A') }}</td>
                                        <td>{{ $onlineAdmission->start->format('d F Y') }}</td>
                                        <td>{{ $onlineAdmission->end->format('d F Y') }}</td>
                                        <td>
                                            @if ($onlineAdmission->status == 1)
                                                <span class="badge badge-primary">{{ __('Active')}}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('Inactive')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('onlineStepEdit', $onlineAdmission->id) }}"  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        {{ __('Showing 0 to 0 of 0 entries')}}</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">{{ __('First')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Previous')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Next')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Last')}}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Online Application Set')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="ChnageUrl" method="post">
                    @csrf
                    <div class="modal-body row">
                        <div class="form-group col-12">
                            <label for="">{{ __('Admission Type') }}</label>
                            <select name="type" class="form-control">
                                <option>{{ __('--Select Class--')}}</option>
                                <option value="1">{{ __('School')}}</option>
                                <option value="2">{{ __('College')}}</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="">{{ __('Session Name')}}</label>
                            <select name="session_id" id="session_id" class="form-control">
                                <option value="">{{ __('--Select Session--')}}</option>
                                @foreach ($sessions as $session)
                                    <option value="{{ $session->id }}">{{ $session->year }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">{{ __('Class Name')}}</label>
                            <select name="class_id" id="class_id" class="form-control">
                                <option value="">{{ __('--Select Class--')}}</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">{{ __('Group Name')}}</label>
                            <select name="group_id" id="group_id" class="form-control">
                                <option value="">{{ __('--Select Class--')}}</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">{{ __('Starting Date')}}</label>
                            <input type="date" name="start" id="start" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <label for="">{{ __('Ending Date')}}</label>
                            <input type="date" name="end" id="end" class="form-control">
                        </div>
                        <div class="form-group col-6" id="statusCheck">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" value="1" name="status" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">{{ __('Status')}}</label>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="onlineId" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-sm">{{ __('Save')}}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@stop

@section('script')
    <script>

        // create action url here
        function createOnlineType(){
            let Createaction = "{{ route('online.typeSave') }}";
            $("#ChnageUrl").attr("action", Createaction);
            $("#statusCheck").hide();
            $('#class_id').val('');
            $('#group_id').val('');
            $('#start').val('');
            $('#end').val('');
            $('#onlineId').val('');
            $('#customSwitch1').val('');
        }

        // update action url here

        function getData($id){
            let academicYear = $id;
            let action = "{{ route('online.typeUpdate') }}";

            $.ajax({
                url:"{{url('admin/load_online_adminsion_id')}}",
                type:'GET',
                data:{academicYear:academicYear},
                success:function (data) {
                    // console.log(data.end.toLocaleDateString());
                    $('#class_id').val(data.class_id);
                    $('#group_id').val(data.group_id);
                    $('#start').val(data.start);
                    $('#end').val(data.end);
                    $('#onlineId').val(data.id);
                    // $('#customSwitch1').val(data.status);

                    $("#statusCheck").show();
                    if(data.status == 1){
                        $('#customSwitch1').prop('checked', true);
                        $('#customSwitch1').val(1)
                    }else{
                        $('#customSwitch1').prop('checked', false);
                    }



                    // edit action url show
                    $("#ChnageUrl").attr("action", action);
                }
            });
        }
        // function checkID(){
        //             if ($('#customSwitch1').is(':checked')) {
        //             $('input[type=checkbox]').prop('checked', true);
        //             $('#customSwitch1').val(1)
        //             }else{
        //                 $('input[type=checkbox]').prop('checked', false);
        //                 $('#customSwitch1').val(0);

        //             }
        //         }
    </script>
@endsection