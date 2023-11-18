@extends('layouts.front_gold')

@section('title','Alumni Application Form')

@section('content')

    <div class="container">
        <div class="mb-5 text-center p-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-success">
                        {{ Session::get('name') }} {{ __('your application request has been submitted successfully.') }} {{ __('Your application id is ') }}{{ Session::get('login') }}
                    </h3>
                    <a href="{{ route('alumni.login') }}" class="btn btn-primary">Download Application Form</a>
                </div>
            </div>
        </div>
    </div>

@stop
