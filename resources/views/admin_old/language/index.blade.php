@extends('layouts.fixed')

@section('title','Language Setting')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>{{ __('Language Setting') }}</h4>
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
                        <div class="card-header"><h5>{{ __('Add Language') }}</h5></div>
                        <div class="card-body">
                            @if(isset($editData))
                                {{  Form::model($editData, ['route' => ['lang.update', ['id'=>$editData->id]],'method'=>'patch'])  }}
                            @else
                                {{  Form::open(['route'=>'languages.add','method'=>'post'])  }}
                            @endif
                            <div class="row">
                                {{  Form::label('name','Name',['class'=>'col-sm-3 col-form-label']) }}
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        {{  Form::text('name',null,['class'=>'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{  Form::label('alias','Alias',['class'=>'col-sm-3 col-form-label']) }}
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        {{  Form::text('alias',null,['class'=>'form-control'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{  Form::label('direction','Direction',['class'=>'col-sm-3 col-form-label']) }}
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        {{ Form::select('direction',['ltr' => 'LTR','rtl'=>'RTL'],null,['class'=>'form-control select2']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{ Form::label('status','Status',['class'=>'col-sm-3 col-form-label']) }}
                                <div class="col-sm-9">
                                    <div class="form-group">
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
                                </div>
                            </div>

                            <div class="text-center">
                                @if(isset($editData))
                                    {{ Form::submit('Update Language',['class'=>'btn btn-outline-success']) }}
                                @else
                                    {{ Form::submit('Save Language',['class'=>'btn btn-secondary btn-sm']) }}
                                @endif
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h5>{{ __('Set Default Language') }}</h5></div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'default.update','method'=>'patch']) }}
                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                {{ Form::select('id',$language,$active->id ?? 1,['class'=>'form-control select2']) }}
                            </div>
                            <div class="text-center">
                                <button class="btn btn-secondary btn-sm">{{ __('Set Default') }}</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4 text-center table-light">
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
                                        <a href="{{route('lang.edit',$lang->id)}}" type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-info btn-sm" href="{{ route('lang.translation',$lang->id) }}">
                                            <i class="fas fa-language"></i>
                                        </a>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td rowspan="6">{{ __('Language Not Found') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
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
