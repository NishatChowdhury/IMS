@extends('layouts.front-inner')

@section('title','Alumni Application Form')

@section('content')

    <div class="container">
        <div class="mb-5 text-center p-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-success">
                        {{ __('Your application request has been submitted successfully.') }}<br>
                        <a href="{{ route('alumni.login') }}" class="btn btn-primary">Download Application Form</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>

@stop
