@extends('layouts.fixed')

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
                                           <th>Is_Transport</th>
                                           <th>Direction</th>
                                       </tr>
                                       @foreach($students as $key => $s)
                                           <input type="hidden" name="student_id[]" value="{{ $s->student->id ?? '' }}">
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
                                                                    @isset($s->student->locationStudent)
                                                                    {{ $s->student->locationStudent->location_id == $l->id ? 'selected' : ''}}
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
                                                               @isset($s->student->locationStudent)
                                                               {{ $s->student->locationStudent->direction == 1 ? 'selected' : ''}}
                                                               @endisset
                                                       >Home To Institute </option>
                                                       <option value="2"
                                                               @isset($s->student->locationStudent)
                                                               {{ $s->student->locationStudent->direction == 2 ? 'selected' : ''}}
                                                               @endisset
                                                       >Institute To Home </option>
                                                       <option value="3"
                                                               @isset($s->student->locationStudent)
                                                               {{ $s->student->locationStudent->direction == 3 ? 'selected' : ''}}
                                                               @endisset
                                                       >Both</option>
                                                   </select>
                                               </div>
                                           </td>
                                       </tr>
                                       @endforeach
                                       <tr>
                                           <td colspan="5">
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

@stop
