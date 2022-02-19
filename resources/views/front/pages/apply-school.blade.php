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
                        A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
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
                                                <a href="{{ url('/online-apply') }}/{{ $admission->id }}" class="btn btn-link">{{ __('View') }}</a>
                                            @else
                                                <span class="text-danger">{{ __('Expired') }}</span>
                                            @endif
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="#"  class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  >{{ __('Download') }}</a>  
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Your Application Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

               <form action="{{ route('download.school.form') }}" method="get">
                   @csrf
                   <div class="modal-body row">
                    <div class="form-group col-12">
                        <label for="">Application ID</label>
                        <input type="text" name="id" class="form-control" placeholder="Enter Application ID">
                        <hr>
                        <button type="submit" class="btn btn-primary btn-sm">Download</button>
                    </div>
                </div>
               </form>

            </div>
        </div>
    </div>
@stop