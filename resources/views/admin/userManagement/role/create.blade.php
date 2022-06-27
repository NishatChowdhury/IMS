@extends('layouts.fixed')

@section('title','Role Lists')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Roles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('role.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Role Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Role Name">
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <h4><span class="badge badge-dark">Modules Permissions</span></h4>
                                </div>
                                <div class="col-12" style="margin-left:40px">
                                    <input type="checkbox"
                                           id="allSelect">
                                    <label for="check01">
                                        Select All Modules Permissions
                                    </label>
                                </div>
                                @foreach ($permissionsCount->chunk(3) as  $chunked)


                                    @foreach($chunked as $key => $permissions)
                                    @php
                                    $permissionKey = str_replace(' ', '-', $key);
                                    @endphp
                                        <div class="{{ count($permissions) > 8 ? 'col-12' : 'col-4'}}">
                                            <div class="bg-white p-5 rounded">
                                                <h6 class="mb-3 font-weight-bold">
                                                  <input type="checkbox"
                                                         value="{{ $permissionKey}}"
                                                         id="checkModule-{{ $permissionKey }}"
                                                         onClick="checkModule('all-permission-{{ $permissionKey }}', this)">
                                                    <label for="check01">
                                                        {{ ucfirst($permissionKey) }} Modules
                                                    </label>
                                                </h6>
                                                <hr>
                                                <div class="all-permission-{{ $permissionKey }} row">
                                                    @foreach($permissions->chunk(8) as $key => $permission)
                                                        @foreach($permission as $key => $per)
                                                        <div class="{{ count($permissions) > 8 ? 'col-4' : 'mr-5'}}">

                                                            <input   type="checkbox"
                                                                     value="{{ $per->id }}"
                                                                     id="check01"
                                                                     name="permission[]"
                                                                     onClick="checkPermission('all-permission-{{ $key }}','checkModule-{{ $key }}',{{ count($permissions) }})">
{{--                                                            $module count  {{ count($module->permissions) }}--}}
                                                            <label for="check-{{ $key }}">
                                                                    {{ ucfirst(str_replace(['.', '-'], ' ', $per->name))  }}
                                                            </label>
                                                        </div>
                                                        @endforeach
{{--                                                        <div>--}}
{{--                                                            <input   type="checkbox"--}}
{{--                                                                     value="{{ $permission->id }}"--}}
{{--                                                                     id="check01"--}}
{{--                                                                     name="permission[]">--}}
{{--                                                                     onClick="checkPermission('all-permission-{{ $key }}','checkModule-{{ $key }}',{{ count($module->permissions) }})">--}}
{{--                                                            $module count  {{ count($module->permissions) }}--}}
{{--                                                            <label for="check-{{ $key }}">--}}
{{--                                                                {{ $permission->name }}--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                            </div>

                            <button class="btn btn-block btn-primary">Save Role</button>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop
@section('script')
    <script>
        // check all checkbox
        $('#allSelect').click(function(){

            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            }else{
                $('input[type=checkbox]').prop('checked', false);
            }
        })

        // check all module checkbox
        function checkModule(className, checkThis){
            let groupIdName = $('#'+checkThis.id);
            let groupClassCheck = $('.'+className+' input');
            console.log(groupClassCheck);
            //
            if(groupIdName.is(':checked')){
                groupClassCheck.prop('checked', true);
            }else{
                groupClassCheck.prop('checked', false);
            }
            //
            // if(groupClassCheck.is('not:checked')){
            //     alert();
            // }
            // checkAllSelection();
        }

        // check permission

        function checkPermission(groupName, groupParent, permissionCount){
            let classCheckCount = $('.'+groupName + ' input:checked').length;

            if(classCheckCount == permissionCount){
                $('#'+groupParent).prop('checked', true);
            }else{
                $('#'+groupParent).prop('checked', false);
                // groupParent.prop('checked', false);
            }
            checkAllSelection();
        }

        {{--function checkAllSelection(){--}}
        {{--    let countPermission = {{ $permissionsCount  }};--}}
        {{--    let countPermissionGroup = {{ count($modules)  }};--}}
        {{--    let permissionCount = countPermissionGroup + countPermission;--}}

        {{--    if($('input[type="checkbox"]:checked').length == permissionCount){--}}
        {{--        $('#allSelect').prop('checked', true);--}}
        {{--    }else{--}}
        {{--        $('#allSelect').prop('checked', false);--}}
        {{--    }--}}
        {{--}--}}
    </script>
@endsection