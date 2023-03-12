@extends('settings::layouts.master')

@section('title',$language->name)

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>{{ __('Dictionary') }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Language') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Edit Dictionary') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="content-tab-title">
                        <h4>{{ $language->name }} ({{ $language->direction }})</h4>
                    </div>
                </div>
                <!-- Tab Content Start -->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="add-category" role="tabpanel" aria-labelledby="add-category-tab">
                        <div class="container">
                            <form id="faqForm" method="post" action="{{route('lang.translate',$language->id)}}" class="add-brand-form">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-condensed table-sm">
                                        @foreach($lines as $key => $line)
                                            <tr>
                                                <td width="50%">{{ $key }}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input name="trans[{{$key}}]" type="text" required class="form-control" value="{{$line}}" placeholder="Enter a sentence">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="form-group">
                                    <div class="justify-content-center d-flex">
                                        <button class="btn btn-warning w-100" type="submit">{{__('Save')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Tab Content End -->
                </div>
            </div>
        </div>
    </div>

@endsection
