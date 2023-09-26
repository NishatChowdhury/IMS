@extends('examandresult::layouts.master')

@section('title', 'Add Competency')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Competency') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Add New Competency') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::open(['route' => 'competency.store', 'method' => 'post']) !!}
                                    <div class="form-group row">
                                        {{ Form::label('Name', 'Competency Name', ['class' => 'col-sm-2 col-form-label']) }}
                                        <div class="col-sm-8">
                                            {{ Form::text('name', null, ['placeholder' => 'Enter Competency Name', 'class' => 'form-control']) }}
                                        </div>
                                        {!! Form::submit('Add', ['class' => 'btn btn-success col-sm-2']) !!}
                                    </div>
                                    <div class="form-group row">
                                        {{ Form::label('Description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
                                        <div class="col-sm-8">
                                            {{ Form::textarea('description', null, ['placeholder' => 'Enter Description Here:', 'class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('Serial') }}</th>
                                        <th class="text-center">{{ __('Competency Name') }}</th>
                                        <th class="text-center">{{ __('Description') }}</th>
                                        <th class="text-center">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $i = 1; @endphp
                                    @foreach ($competencies as $competency)
                                        <tr>
                                            <td class="text-center"> {{ $i++ }}</td>
                                            <td class="text-center"> {{ $competency->name }} </td>
                                            <td class="text-center"> {{ $competency->description }} </td>
                                            <td class="text-center">
                                                {{ Form::open(['route' => ['competency.destroy', $competency->id], 'method' => 'post', 'onsubmit' => 'return confirmDelete()']) }}
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleEditModal" onclick="loadEditForm({{$competency->id}})"><i class="fas fa-edit"></i></button>
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fas fa-trash"></i>
                                                </button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Edit Modal -->
    <div class="modal fade" id="exampleEditModal" tabindex="-1" aria-labelledby="exampleEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="edit-model-header">
                    <h5 class="modal-title" id="exampleEditModalLabel">{{ __('Edit Competency') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Edit form will appeared here -->
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function confirmDelete() {
            var x = confirm('Are you sure you want to delete this Competencty?');
            return !!x;
        }
    </script>
    <script>
        function loadEditForm(id) {
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('competency.edit') }}",
                data: {
                    _token: token,
                    id: id
                },
                type: 'get'
            }).done(function(e) {
                $("#edit-form").remove();
                $("#edit-model-header").after(e);
            })
        }
    </script>
@stop
