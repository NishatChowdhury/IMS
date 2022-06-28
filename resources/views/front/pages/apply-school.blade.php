@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2></h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __('Result') }} </a>
                        </li>
                        <li class="breadcrumb-item">{{ __('School Admission') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        {{ __(' A simple primary alert with')}} <a href="#" class="alert-link">{{ __('an example link')}}</a>. {{ __('Give it a
                        click if you like.')}}
                    </div>
                    @if ($message = Session::get('status'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="row">
                        <div class="table-responsive my-4">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-semiBold">{{ __('Name') }}</th>
                                    <th class="text-center">{{ __('Expire Date') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($admissionStep as $admission)
                                    <tr>
                                        <td>{{ $admission->classes->name }} {{ $admission->group_id ? $admission->group->name : '' }}</td>
                                        <td class="text-center">
                                            {{ __('From') }} <b>{{ $admission->start->format('d F Y') }}</b> {{ __('To') }}
                                            <b>{{ $admission->end->format('d F Y') }}</b>
                                        </td>
                                        <td class="text-center">
                                            @if($admission->end->endOfDay() > now())
                                                @if($admission->type == 1)
                                                    <a href="{{ url('/online-apply') }}/{{ $admission->id }}" class="btn btn-link">{{ __('Apply Now') }}</a>
                                                @else
                                                <a href="{{ url('/online-apply-college') }}" class="btn btn-link">Apply View</a>
                                                @endif
                                            @else
                                                <span class="text-danger">{{ __('Expired') }}</span>
                                            @endif
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">{{ __('View Application') }}</a>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Download Your Application Form')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

               <form id="downloadForm" method="get">
                   @csrf
                   <div class="modal-body row">
                    <div class="form-group col-12">
                        <label for="">{{ __('Application ID')}}</label>
                        <input type="text" id="applcationID" name="id" class="form-control" placeholder="Enter Application ID">
                        <hr>
                        <button type="submit"  class="btn btn-primary btn-sm">{{ __('Download')}}</button>
                    </div>
                </div>
               </form>

            </div>
        </div>
    </div>
@stop

@section('script')
<script>

    $('#applcationID').keyup(function(){
        let id = $('#applcationID').val();
         let action = "{{ url('download-school-pdf') }}/"+id;
         $('#downloadForm').attr('action', action);
    });


</script>
@endsection