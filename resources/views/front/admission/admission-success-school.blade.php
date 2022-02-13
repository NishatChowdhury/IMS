@extends('layouts.front-inner')

@section('title','Online Admission Form')
@php $data = Session::get('studentStore'); @endphp
@section('content')

    <div class="container">
        <div class="mb-5 text-center p-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-success">
                        {{ $data['name'] }}
                        {{-- {{ $studentStore->name }}  --}}
                        your admission request has been submitted successfully <br> your Id 
                        {{ $data['id'] }}
                        {{-- {{ $studentStore->id }}. --}}
                    </h3>
                </div>
            </div>
        </div>
    </div>

@stop
