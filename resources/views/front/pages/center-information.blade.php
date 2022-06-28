@extends('layouts.front-inner')

@section('title','Center Information')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>{{ strtoupper($content->name) }}</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __('Information')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ ucfirst($content->name) }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">

                {!! $content->content !!}

            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop