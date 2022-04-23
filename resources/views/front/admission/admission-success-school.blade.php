@extends('layouts.front-inner')

@section('title','Online Admission Form')
@php $data = Session::get('studentStore'); @endphp
@section('content')

    <div class="container">
        <div class="mb-5 text-center p-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-success">
                        <b>{{ $data['name'] }}</b> {{ __('your admission request has been submitted successfully your application Id') }} {{ $data['id'] }}
                        <a href="{{ route('download.school.form', $data['password']) }}" class="btn btn-primary">Download Application Form</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>

@stop
