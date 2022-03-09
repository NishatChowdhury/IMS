@extends('layouts.fixed')

@section('title','Admission | Examinations')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Online Admission Type Set</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admission</a></li>
                        <li class="breadcrumb-item active">Online Admission</li>
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
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dec-block">
                                       <h4>Edit Form</h4>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="ChnageUrl" method="post" action="{{ route('online.typeUpdate') }}">
                                @csrf
                                <div class="modal-body row">
                                 <div class="form-group col-12">
                                     <label for="">Admission Type</label>
                                     <select name="type" class="form-control">
                                         <option>--Select Admission Type--</option>                            
                                         <option value="1" {{ $onlineAdmission->type == 1 ? 'selected' : '' }}>School</option>                            
                                         <option value="2" {{ $onlineAdmission->type == 2 ? 'selected' : '' }}>College</option>                            
                                     </select>
                                 </div>
                                 <div class="form-group col-12">
                                     <label for="">Session Name</label>
                                     <select name="session_id" id="session_id" class="form-control">
                                         <option value="">--Select Session--</option>
                                             @foreach ($sessions as $session)
                                             <option value="{{ $session->id }}"
                                                {{ $onlineAdmission->session_id == $session->id ? 'selected' : '' }}
                                                
                                                >{{ $session->year }}</option>   
                                             @endforeach
                                         
                                     </select>
                                 </div>
                                 <div class="form-group col-6">
                                     <label for="">Class Name</label>
                                     <select name="class_id" id="class_id" class="form-control">
                                         <option value="">--Select Class--</option>
                                             @foreach ($classes as $class)
                                             <option value="{{ $class->id }}"
                                                {{ $onlineAdmission->class_id == $class->id ? 'selected' : '' }}
                                                >{{ $class->name }}</option>   
                                             @endforeach
                                         
                                     </select>
                                 </div>
                                 <div class="form-group col-6">
                                     <label for="">Group Name</label>
                                     <select name="group_id" id="group_id" class="form-control">
                                         <option value="">--Select Group--</option>
                                                 @foreach ($groups as $group)
                                                 <option value="{{ $group->id }}"
                                                    {{ $onlineAdmission->group_id == $group->id ? 'selected' : '' }}
                                                    >{{ $group->name }}</option>
                                                 @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-6">
                                     <label for="">Starting Date</label>
                                     <input type="date" name="start" id="start" class="form-control" value="{{ $onlineAdmission->start->format('Y-m-d') }}">
                                 </div>
                                 
                                 <div class="form-group col-6">
                                     <label for="">Ending Date</label>
                                     <input type="date" name="end" id="end" class="form-control" value="{{ $onlineAdmission->end->format('Y-m-d') }}">
                                 </div>
                                 <div class="form-group col-6" id="statusCheck">
                                         <div class="custom-control custom-switch">
                                           <input type="checkbox"  value="1" {{  $onlineAdmission->status == 1 ? 'checked' : '' }} name="status" class="custom-control-input" id="customSwitch1">
                                           <label class="custom-control-label" for="customSwitch1">Status</label>
                                         </div>
                                 </div>
                                 <input type="hidden" name="id" value="{{ $onlineAdmission->id  }}" class="form-control">
                             </div>
                             <div class="modal-footer">
                                 <div class="form-group col-12">
                                     <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                 </div>
                             </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop


@section('script')
<script>

// create action url here
    // function createOnlineType(){
    //     let Createaction = "{{ route('online.typeSave') }}";
    //     $("#ChnageUrl").attr("action", Createaction);
    //     $("#statusCheck").hide();
    //                 $('#class_id').val('');
    //                 $('#group_id').val('');
    //                 $('#start').val('');
    //                 $('#end').val('');
    //                 $('#onlineId').val('');
    //                 $('#customSwitch1').val('');
    // }

</script>
@endsection