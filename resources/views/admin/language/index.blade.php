@extends('layouts.fixed')

@section('title','Language Setting')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>{{__('Language Setting')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Language') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Language Setting') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h3>Add Language</h3></div>
                        <div class="card-body">
                            @if(isset($editData))
                                {!!  Form::model($editData, ['route' => ['lang.update', ['id'=>$editData->id]],'method'=>'post'])  !!}
                            @else
                                {!!  Form::model(null, ['route' => ['languages.add', null]])  !!}
                            @endif
                            {{  Form::label('Name') }}
                            {{  Form::text('name',null,['class'=>'form-control']) }}
                            {{  Form::label('Alias') }}
                            {{  Form::text('alias',null,['class'=>'form-control'])}}
                            <div class="form-group mt-2">
                                {{ Form::label('Status :') }}
                                <label class="switch">
                                    @if(isset($editData))
                                        <input type="checkbox" {{$editData->is_active==1 ? 'checked':''}} name="status"
                                               value="1" id="change_status">
                                    @else
                                        <input type="checkbox" checked name="status" value="1" id="change_status">
                                    @endif
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                {{  Form::label('Direction') }}
                                {{ Form::select('direction',['ltr' => 'LTR','rtl'=>'RTL'],null,['class'=>'form-control select2']) }}
                            </div>
                        </div>
                        <div class="card-footer">
                            @if(isset($editData))
                                {{ Form::submit('Update Language',['class'=>'btn btn-outline-success']) }}
                            @else
                                {{ Form::submit('Save Language',['class'=>'btn btn-outline-success']) }}
                            @endif
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h3>Set Default Language</h3></div>
                        <div class="card-body">
                            {!! Form::model(null, ['route' => ['default.update', null]]) !!}
                            Name :
                            {{ Form::select('id',$language,$active->id,['class'=>'form-control select2']) }}
                            <input type="hidden" name="prev" value="{{$active->id}}">
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-outline-success">Set Default</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-bordered table-striped mt-4 text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Status</th>
                        <th>is-default</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($languages as $lang)
                        <tr>
                            <td>{{$lang->id}}</td>
                            <td>{{$lang->name}}  {{$lang->default==1 ? '(default)':''}}</td>
                            <td>{{$lang->alias}}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox"
                                           {{$lang->is_active==1 ? 'checked' :''}} onclick="changeStatus({{$lang->is_active}},{{$lang->id}})">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            {{--                        <td>{{ $lang->is_active==1?'on':'off'}}</td>--}}
                            <td>{{$lang->default}}</td>

                            <td class="text-center">
                                {{ Form::open(['route'=>['lang.delete',$lang->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fas fa-trash"></i>
                                </button>
                                <a href="{{route('lang.edit',$lang->id)}}" type="button" class="btn btn-warning btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                {{ Form::close() }}
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td rowspan="6">Language Not Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@stop

@section('script')
    <script>
        function confirmDelete() {
            var x = confirm('Are you sure you want to delete this Language?');
            return !!x;
        }
    </script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });

        function changeStatus(val, id) {
            var token = "{{csrf_token()}}";
            $.ajax({
                url: "{{ route('change.status') }}",
                method: 'POST',
                data: {
                    '_token': token,
                    'st': val,
                    'id': id,
                },
                success: function () {
                    location.reload(true);
                }
            })
        }

        $('#change_status').on('change', function () {
            this.value = this.checked ? 1 : 0;
        });
    </script>
@endsection
