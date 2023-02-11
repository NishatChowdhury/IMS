@extends('layouts.front-inner')

@section('title','Online Admission')

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
                            <a href="#">{{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __('Result')}} </a>
                        </li>
                        <li class="breadcrumb-item">

                        </li>
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
                    <div class="row">
                        <div class="table-responsive my-4">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-semiBold">{{ __('Name')}}</th>
                                    <th scope="col">{{ __('Date')}}</th>
                                    <th scope="col">{{ __('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($admissionStep as $admission)
                                    <tr>
                                        <td>{{ $admission->class_id ? $admission->classes->name : '' }} {{ $admission->group->name ?? '' }}</td>
                                        <td>{{ $admission->end }}</td>
                                        <td>
                                            @if($admission->type == 1)
                                                <a href="{{ url('/online-apply') }}/{{ $admission->id }}" class="btn btn-link">{{ __('View')}}</a>
                                            @else
                                                <a href="{{ url('/online-apply-college') }}" class="btn btn-link">{{ __('View')}}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>



@stop