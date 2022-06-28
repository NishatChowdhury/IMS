@extends('layouts.fixed')

@section('title','Role Lists')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('Create Roles')}}</li>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-info">
                    <div class="card-header">
                    <h4>{{ __('Create Role & Add Permission')}}</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('role.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$role->id}}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">{{ __('Role Name')}}</label>
                                        <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <h4><span class="badge badge-dark">{{ __('Modules Permissions')}}</span></h4>
                                </div>
    <div class="col-12" style="margin-left:40px">
                                    <input type="checkbox"
                                    id="allSelect"
                                    @if(isset($role))
                                        {{count($role->permissions) == $permissionsCount ? 'checked' : ''}}
                                    @endif
                                    >
                                    <label for="check01">
                                        {{ __(' Select All Modules Permissions')}}
                                    </label>
                                </div>
                                @foreach ($modules->chunk(3) as $chunked)
                                    @foreach($chunked as $key=> $module)
                                    <div class="col-4">
                                        <div class="bg-white p-5 rounded">
                                         <h6 class="mb-3 font-weight-bold">
                                             <input type="checkbox"
                                                    value="{{ $module->id }}"
                                                    id="checkModule-{{ $key }}"
                                                    onClick="checkModule('all-permission-{{ $key }}', this)"
                                                    @if(isset($role))
                                                        @foreach($role->permissions as $rolePermission)
                                                            {{ $module->id ==  $rolePermission->module_id ? 'checked' : ''}}
                                                        @endforeach
                                                    @endif
                                             >
                                           <label for="check01">
                                            {{ ucfirst($module->name) }} {{ __('Modules')}}
                                           </label>
                                         </h6>
                                            <hr>
                                        <div class="all-permission-{{ $key }}">
                                                @foreach($module->permissions as $key => $permission)
                                         <div>
                                           <input   type="checkbox"
                                                    value="{{ $permission->id }}"
                                                    id="check01"
                                                    name="permission[]"
                                                    onClick="checkPermission('all-permission-{{ $key }}','checkModule-{{ $key }}',{{ count($module->permissions) }})"
                                                    @if(isset($role))
                                                        @foreach($role->permissions as $rolePermission)
                                                            {{ $permission->id ==  $rolePermission->id ? 'checked' : ''}}
                                                        @endforeach
                                                    @endif

                                           >
                                           <label for="check-{{ $key }}">
                                             {{ $permission->name }}
                                           </label>
                                        </div>
                                        @endforeach
                                        </div>
                                      </div>
                                </div>
                                    @endforeach
                                @endforeach

                            </div>

                            <button class="btn btn-block btn-primary">{{ __('Save Role')}}</button>
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

              if(groupIdName.is(':checked')){
                groupClassCheck.prop('checked', true);
              }else{
                groupClassCheck.prop('checked', false);
              }

              if(groupClassCheck.is('not:checked')){
                alert();
              }
              checkAllSelection();
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

            function checkAllSelection(){
              let countPermission = {{ $permissionsCount  }};
              let countPermissionGroup = {{ count($modules)  }};
              let permissionCount = countPermissionGroup + countPermission;

              if($('input[type="checkbox"]:checked').length == permissionCount){
                $('#allSelect').prop('checked', true);
              }else{
                $('#allSelect').prop('checked', false);
              }

            }
    </script>
@endsection