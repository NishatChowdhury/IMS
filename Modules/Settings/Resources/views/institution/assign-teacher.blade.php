@extends('settings::layouts.master')

@section('title','Institution Mgnt | Subjects')
@section('style')
  <link rel="stylesheet" href="{{asset('/plugins/select2/select2.css')}}">
  <style>
      .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #195d76!important;
}
  </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Teacher On Subject</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Classes</a></li>
                        <li class="breadcrumb-item active">Assign Teacher</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{--                <div class="col-3"></div>--}}
                <div class="col-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="header">
                                <h6>Class: {{$academic->classes->name ?? ''}}, Group: {{$academic->group->name ?? 'N/A'}}</h6>
                                <h6>Section: {{$academic->section->name ?? 'N/A'}}, Session: {{$academic->session->year ?? 'N/A'}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-sm">
                                    <tr>
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($subjects as $subs)

                                        <form action="{{ route('institution.assignTeacher.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="assign_subject_id" value="{{ $subs->id }}">
                                            <tr>
                                                <td>{{$subs->subject->name ?? ''}}</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="staff_id[]" multiple="multiple" class=" select2 " style="width: 100%;">
                                                            @foreach($teachers as $t)
                                                                <option
                                                                        @isset($subs)
                                                                            @if(is_array($subs->teacher_id) || is_object($subs->teacher_id))
                                                                                @foreach($subs->teacher_id as $d)
                                                                                     {{ $d == $t->id ? 'selected' : '' }}
                                                                                @endforeach
                                                                            @endif

                                                                        @endisset
                                                                        value="{{$t->id}}"
                                                                >{{$t->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-dark btn-sm btn-block">Save Change</button>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure, you want to unmount this subject?');
            return !!x;
        }
        // check all checkbox
        $('#allSelect').click(function(){
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            }else{
                $('input[type=checkbox]').prop('checked', false);
            }
        })
    </script>
    <script src="{{asset('/plugins/select2/select2.js')}}"></script>
    <script>
          $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
              theme: 'bootstrap4'
            })
        })
    </script>

@stop
