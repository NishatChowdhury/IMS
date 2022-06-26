@extends('layouts.fixed')

@section('title','Admission | Applicants')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('{{ __('Online Applicants')}}') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('{{ __('Admission')}}') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('{{ __('Applicants')}}') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
{{--                                            <h5 style="margin-bottom: 0px;">Total Found</h5>--}}
{{--                                            <p>00</p>--}}
                                        </div>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>{{ __('
                                            Details Pdf ')}}</button>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            {{ __('Details Pdf ')}}</button>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            {{ __('Notify')}}</button>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>{{ __('
                                            Summery Pdf')}}</button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            {{ __('CSV')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>{{ __('Student')}}</th>
                                    <th>{{ __('Father')}}</th>
                                    <th>{{ __('Mother')}}</th>
                                    <th>{{ __('Class')}}</th>
                                    <th>{{ __('Academic Year')}}</th>
                                    <th>{{ __('Status')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        {{ __('Showing 0 to 0 of 0 entries')}}</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">{{ __('First')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Previous')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Next')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Last')}}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
