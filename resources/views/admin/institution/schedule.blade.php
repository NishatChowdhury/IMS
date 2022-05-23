@extends('layouts.fixed')

@section('title','Institution Mgnt | Profile')

@section('style')
    <style>
        .items {
               display: inline-block;
                /* background: #ededed; */
                padding: 11px;
                border-radius: 10px;
                /* font-weight: 700; */
                cursor: pointer;
                border: 1px solid #cfcfcf;
                color: #565656;
        }
        .items p {
    margin: 0px;
}
        .classRouting{
            padding: 0px;
            margin: 0px;
        }
        .classRouting li{
            list-style: none;
            display: inline-block;
            margin-right: 10px;
        }

        .days {
            font-weight: bold;
            vertical-align: middle;
            text-align: center;
            display: table-cell;
        }

    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class Routine</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Academic Class</a></li>
                        <li class="breadcrumb-item active">Class Routine</li>
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
                        <div class="row">
                           <div class="col-12">
                                <div class="card-header">
                                <button class="btn btn-sm btn-dark" onclick="createClassSchedule()" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-plus-circle"></i>Create Class Routing</button>
                            </div>
                           </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-centered mb-0 table-sm">
                                           @foreach($schedules as $key => $sb)
                                             <tr>
                                                <td width="10%" style="font-weight: bold;vertical-align: middle;text-align: center;display: table-cell;">
                                                    {{ $key }}
                                                </td>
                                                <td>
                                                    <ul class="classRouting">
                                                    @foreach($sb as $s)
                                                    <li>
                                                        <div class="items mb-1 text-center" onclick="editClassSchedule({{$s}})">
                                                            <p style="font-weight: bold">
{{--                                                                <i class="fas fa-book"></i>--}}
                                                                {{ $s->subject->name ?? '' }}
                                                            </p>
                                                            <p>
{{--                                                                <i class="fas fa-clock"></i>--}}

                                                                 {{date('g:i A', strtotime($s->start)) }} to {{date('g:i A', strtotime($s->end)) }}</p>
                                                        </div>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Class Routine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="ChnageUrl" method="post" >
                    @csrf
                    <input type="hidden" name="academic_class_id"  value="{{  $academicClass->id }}">
                    <input type="hidden" name="name" value="demo">
                    <div class="modal-body row">
                        <div class="form-group col-12">
                            <label for="">{{ __('Day') }}</label>
                            <select name="day" id="day" class="form-control">
                                <option>--Select Day--</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Subject Name</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                <option value="">--Select Subject--</option>
                                <option value="0"><b>Tiffin Break</b></option>
                                @foreach ($subjects as $cl)
                                    <option value="{{ $cl->subject->id ?? ''}}">{{ $cl->subject->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Teacher Name</label>
                            <select name="teacher_id" id="teacher_id" class="form-control">
                                <option value="">--Select Teacher--</option>
                                @foreach ($teachers as $t)
                                    <option value="{{ $t->id ?? ''}}">{{ $t->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Starting Time</label>
                            <input type="time" name="start" id="start" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <label for="">Ending Time</label>
                            <input type="time" name="end" id="end" class="form-control">
                        </div>
                        <input type="hidden" name="id" id="onlineId" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-sm" >Save</button>
                            <a onclick="removeItems()" class="btn btn-danger btn-sm" id="foredit" style="display: none">Remove</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>



@section('script')
    <script>
        function createClassSchedule(){
            $('#foredit').hide();
             let Createaction = "{{ url('admin/institution/class/schedule/store') }}";
            $("#ChnageUrl").attr("action", Createaction);
            $('#day').val('');
            $('#start').val('');
            $('#end').val('');
            $('#subject_id').val('');
            $('#teacher_id').val('');
            $('#onlineId').val('');
        }
        function editClassSchedule(id){
            $('#foredit').show();
            let urlDel = "{{ url('admin/institution/class/schedule/delete') }}/"+id.id;
            $("#foredit").attr("href", urlDel);

            let Createaction = "{{ url('admin/institution/class/schedule/update') }}";
            $("#ChnageUrl").attr("action", Createaction);
            $('#exampleModal').modal('show');
            $('#day').val(id.day)
            $('#start').val(id.start)
            $('#end').val(id.end)
            $('#subject_id').val(id.subject_id)
            $('#teacher_id').val(id.teacher_id)
            $('#onlineId').val(id.id)
                    {{--let Createaction = "{{ route('online.typeSave') }}";--}}
                    {{--$("#ChnageUrl").attr("action", Createaction);--}}
                    {{--$("#statusCheck").hide();--}}
                    {{--$('#class_id').val('');--}}
                    {{--$('#group_id').val('');--}}
                    {{--$('#start').val('');--}}
                    {{--$('#end').val('');--}}
                    {{--$('#onlineId').val('');--}}
                    {{--$('#customSwitch1').val('');--}}
        }
    </script>
@endsection






@stop