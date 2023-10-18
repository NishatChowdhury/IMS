@extends('settings::layouts.master')

@section('title', 'Institution Mgnt | Classes')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sections & Groups</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Institution Management') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Group') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="card">
                            <div class="card-header" style="border-bottom: none !important;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#section" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;">
                                <i class="fas fa-plus-circle"></i> {{ __('New') }}</button>
                            <h3 style="display: inline-block; float: right">Sections</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('SL') }}</th>
                                    <th>{{ __('Section Name') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>
                                            <a type="button" class="btn btn-warning btn-sm edit_sec" value='{{ $section->id }}' style="margin-left: 5px;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a type="button" href="{{ route('institution.delete_section', $section->id) }}" class="btn btn-danger btn-sm" style="margin-left: 5px;">
                                                <i class="fas fa-trash "></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#GroupModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;">
                                <i class="fas fa-plus-circle"></i> {{ __('New') }}</button>
                            <h3 style="display: inline-block; float: right">{{ __('Groups') }}</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Group Name') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td>
                                            <a type="button" class="btn btn-warning btn-sm edit_group" value='{{ $group->id }}' style="margin-left: 5px;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a type="button" href="{{ route('institution.delete_grp', $group->id) }}" class="btn btn-danger btn-sm delete_grp" style="margin-left: 10px;">
                                                <i class="fas fa-trash "></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for Group Creation -->
    <div class="modal fade" id="section" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['route' => 'institution.create_section', 'method' => 'post']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Section') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">{{ __('Section Name') }}*</label>
                        <input type="text" name="name" class="form-control" id="" required="required" aria-describedby="" placeholder="Exaple: A, B, C">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">{{ __('ADD') }}</button></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for Groups End-->


    <!-- ***/ Pop Up Model for Group Creation -->
    <div class="modal fade" id="GroupModal" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{  Form::open(['url' => 'admin/institution/create-group', 'method' => 'post']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Group') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">{{ __('Group Name') }}*</label>
                        <input type="text" name="name" class="form-control" required="required" aria-describedby="" placeholder="Example: Science, Huminities">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-plus-circle"></i> {{ __('ADD') }}</button></div>
                {{  Form::close() }}
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for Groups End-->


    {{-- Edit Section Model --}}
    <div class="modal fade" id="edit_sec" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['url' => 'admin/institution/update-section', 'method' => 'post']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Update Section') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::hidden('id', null, ['id' => 'sec_id']) }}
                    <div class="form-group">
                        <label for="">{{ __('Section Name') }}*</label>
                        <input type="text" name="section_name" class="form-control" id="section_name" required="required" aria-describedby="" placeholder="Example: A, B, C">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-plus-circle"></i>{{ __('Update') }}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    {{-- Edit Section Model --}}

    <!-- ***/ Pop Up Model for Edit Group -->
    <div class="modal fade" id="edit_group" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['url' => 'admin/institution/update-group', 'method' => 'post']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Group') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::hidden('group_id', null, ['id' => 'group_id']) }}
                    <div class="form-group">
                        <label for="">{{ __('Group Name') }}*</label>
                        <input type="text" name="group_name" class="form-control" id="group_name" required="required" aria-describedby="" placeholder="Example: Science, Business Studies">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-plus-circle"></i>{{ __('Update') }}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for Edit Groups End-->


@stop
@section('script')
    <script>
        $(document).on('click', '.edit_sec', function() {
            $("#edit_sec").modal("show");
            var id = $(this).attr('value');
            $.ajax({
                method: "post",
                url: "{{ url('admin/institution/edit-section') }}",
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#sec_id").val(response.id);
                    $("#section_name").val(response.name);

                },
                error: function(err) {
                    console.log(err);
                }
            });
        });

        $(document).on('click', '.edit_group', function() {
            $("#edit_group").modal("show");
            var id = $(this).attr('value');
            $.ajax({
                method: "post",
                url: "{{ url('admin/institution/edit-group') }}",
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#group_id").val(response.id);
                    $("#group_name").val(response.name);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    </script>
@stop
