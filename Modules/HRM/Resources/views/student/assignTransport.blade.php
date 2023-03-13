@extends('hrm::layouts.master')

@section('style')
    <style>
        ul.parent_info {
            margin: 0px;
            padding: 0px;
        }

        ul.parent_info li {
            list-style: none;
            padding: 0px;
            margin-left: 2px;
            line-height: 12px;
        }
        .input_date {
    width: 69%;
    display: inline-block;
}
    </style>
@endsection
@section('title','Student Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Assign Transport</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Student Transport</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('student.transport') }}" method="get">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Class</label>
                                            <select name="academic_class_id" id="" class="form-control">
                                                <option disabled selected>--Select Class--</option>
                                                @foreach($academicClass as $ac)
                                                <option value="{{$ac->id}}">
                                                    {{ $ac->classes->name ?? '' }} {{ $ac->group->name ?? '' }} {{ $ac->section->name ?? '' }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <div class="form-group" style="margin-top: 9px">
                                           <button type="submit" class="btn btn-block btn-primary btn-sm">
                                               <i class="fa fa-search"></i>&nbsp
                                           </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(count($students) > 0)
                               <div class="table-responsive">
                                   <form action="{{ route('storeAssignTransport') }}" method="post">
                                       @csrf
                                   <table class="table table-bordered table-sm text-center">
                                       <tr>
                                           <th>SL</th>
                                           <th>Name</th>
                                           <th>Rank</th>
                                           <th>Location</th>
                                           <th>Direction</th>
                                           <th>Date</th>
                                       </tr>
                                       @foreach($students as $key => $s)
                                           <input type="hidden" name="student_academic_id[]" value="{{ $s->id ?? '' }}">
                                       <tr>
                                           <td>{{ $key+1 }} </td>
                                           <td>{{ $s->student->name ?? '' }}</td>
                                           <td>{{ $s->rank ?? '' }}</td>
                                           <td>
                                               <div class="form-group">
                                                   <select name="location_id[]" id="" class="form-control">
{{--                                                       <option value="" disabled selected>--Select Transport--</option>--}}
                                                       <option value="0">Not Taking Transport</option>
                                                       @foreach($locations as $l)
                                                            <option
                                                                    value="{{ $l->id }}"
                                                                    @isset($s->locationStudent)
                                                                    {{ $s->locationStudent->location_id == $l->id ? 'selected' : ''}}
                                                                    @endisset
                                                                    >{{ $l->name }}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-group">
                                                   <select name="direction[]" id="" class="form-control">
                                                       <option value="0">Not Taking Transport</option>
                                                       <option value="1"
                                                               @isset($s->locationStudent)
                                                               {{ $s->locationStudent->direction == 1 ? 'selected' : ''}}
                                                               @endisset
                                                       >Home To Institute </option>
                                                       <option value="2"
                                                               @isset($s->locationStudent)
                                                               {{ $s->locationStudent->direction == 2 ? 'selected' : ''}}
                                                               @endisset
                                                       >Institute To Home </option>
                                                       <option value="3"
                                                               @isset($s->locationStudent)
                                                               {{ $s->locationStudent->direction == 3 ? 'selected' : ''}}
                                                               @endisset
                                                       >Both</option>
                                                   </select>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="input_date">
                                                    <input type="date" name="starting_date[]" class="form-control" value="{{ $s->locationStudent->starting_date ?? '' }}">
                                               </div>
                                        <button type="button" onclick="getId({{$s->id}})"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-sign-out-alt"></i>
                                          </button>
                                               @isset($s->locationStudent)
                                               @if($s->locationStudent->ending_date && $s->locationStudent->ending_date >= $s->locationStudent->starting_date)
                                               <br>
                                               <span><b>Ending Date : {{$s->locationStudent->ending_date}}</b> </span>
                                               @endif
                                               @endisset
                                           </td>
                                       </tr>
                                       @endforeach
                                       <tr>
                                           <td colspan="6">
                                               <button class="btn btn-block btn-dark">Save Data</button>
                                           </td>
                                       </tr>
                                   </table>
                                    </form>
                               </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ending Transport</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('assign.transport.end') }}" method="post">
                    @csrf
                    <div class="modal-body row">
                        <div class="form-group col-12">
                            <label for="">Ending Date</label>
                            <input type="date" name="ending_date" id="end" class="form-control">
                        </div>
                        <input type="hidden" name="id" id="onlineId" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-sm">Save Change</button>
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
        function getId(id){
            $('#onlineId').val(id);
        }

        // update action url here


    </script>
@endsection