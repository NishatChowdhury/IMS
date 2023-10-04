@extends('settings::layouts.master')

@section('title', 'Settings | Result System Setting')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Result System Setting') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Result System Setting') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-3">
                            <form method="POST" action="{{ route('result-system.result-system-1', ['id1' => 1]) }}">
                                @csrf
                                <input type="hidden" name="result_id" value="{{ 1 }}">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('assets/img/result/result-2.jpg') }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('Result System V1') }}</h5>
                                        <p class="card-text">
                                            {{ __('This Version of Result Management System follows Government declared rules. As an Example - The Marks for Bangla and English with two papers will be calculated in an average. ') }}
                                        </p>
                                        <button type="submit"
                                            class="btn @if ($data->result_id == 1) btn-danger @else btn-success @endif">
                                            @if ($data->result_id == 1)
                                                {{ __('Activated') }}
                                            @else
                                                {{ __('Activate') }}
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form method="POST" action="{{ route('result-system.result-system-2', ['id2' => 2]) }}">
                                @csrf
                                <input type="hidden" name="result_id" value="{{ 2 }}">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('assets/img/result/result-2.jpg') }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('Result System V2') }}</h5>
                                        <p class="card-text">
                                            {{ __('This version of Result Management System follows some customized Settings. As an Example - This version will calculate Model Tests/Class Tests numbers with the Terminal Exams.') }}
                                        </p>
                                        <button type="submit"
                                            class="btn @if ($data->result_id == 2) btn-danger @else btn-success @endif">
                                            @if ($data->result_id == 2)
                                                {{ __('Activated') }}
                                            @else
                                                {{ __('Activate') }}
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form method="POST" action="{{ route('result-system.result-system-2', ['id2' => 3]) }}">
                                @csrf
                                <input type="hidden" name="result_id" value="{{ 3 }}">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('assets/img/result/result-2.jpg') }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('Result System V3') }}</h5>
                                        <p class="card-text">
                                            {{ __('This version of Result Management System follows some customized Settings. As an Example - This version will calculate Model Tests/Class Tests numbers with the Terminal Exams.') }}
                                        </p>
                                        <button type="submit"
                                            class="btn @if ($data->result_id == 3) btn-danger @else btn-success @endif">
                                            @if ($data->result_id == 3)
                                                {{ __('Activated') }}
                                            @else
                                                {{ __('Activate') }}
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form method="POST" action="{{ route('result-system.result-system-2', ['id2' => 4]) }}">
                                @csrf
                                <input type="hidden" name="result_id" value="{{ 4 }}">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('assets/img/result/result-2.jpg') }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('Result System V4') }}</h5>
                                        <p class="card-text">
                                            {{ __('This version of Result Management System follows some customized Settings. As an Example - This version will calculate Model Tests/Class Tests numbers with the Terminal Exams.') }}
                                        </p>
                                        <button type="submit"
                                            class="btn @if ($data->result_id == 4) btn-danger @else btn-success @endif">
                                            @if ($data->result_id == 4)
                                                {{ __('Activated') }}
                                            @else
                                                {{ __('Activate') }}
                                            @endif
                                        </button>
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
