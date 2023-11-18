@extends('settings::layouts.master')

@section('title', 'Settings | Layouts Setting')

@section('content')
    <!-- Content Header (Page header) -->

    <!-- ***/Image page inner Content Start-->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Select Layout') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Layouts') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="{{route('layout.update',['id' => 1])}} ">
                                @csrf
                                <input type="hidden" name="layout_id" value="{{ 1 }}">
                                <div class="card" style="width:500px;">
                                    <img src="{{ asset('assets/img/layouts/layout_1.png') }}" class="card-img"
                                         alt="...">
                                    <div class="card-body">
                                        <button type="submit"
                                                class="btn @if ($layoutData->layout_id == 1) btn-danger @else btn-success @endif">
                                            @if ($layoutData->layout_id == 1)
                                                {{ __('Activated') }}
                                            @else
                                                {{ __('Activate') }}
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="{{route('layout.update',['id' => 2])}} ">
                                @csrf
                                <input type="hidden" name="layout_id" value="{{ 2 }}">
                                <div class="card" style="width:500px;">
                                    <img src="{{ asset('assets/img/layouts/layout_2.png') }}" class="card-img"
                                         alt="...">
                                    <div class="card-body">
                                        <button type="submit"
                                                class="btn @if ($layoutData->layout_id == 2) btn-danger @else btn-success @endif">
                                            @if ($layoutData->layout_id == 2)
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

