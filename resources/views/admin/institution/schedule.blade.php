@extends('layouts.fixed')

@section('title','Institution Mgnt | Profile')

@section('style')
    <style>
        .items {
            display: inline-block;
            background: #ededed;
            padding: 11px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
        }
        .classRouting{
            padding: 0px;
            margin: 0px;
        }
        .classRouting li{
            list-style: none;
            display: inline-block;
            margin-right: 10px;
        }

        .days {
            font-weight: bold;
            vertical-align: middle;
            text-align: center;
            display: table-cell;
        }

    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class Routine</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Academic Class</a></li>
                        <li class="breadcrumb-item active">Class Routine</li>
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
                        <div class="row">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-centered mb-0 table-sm">
                                           @for($i = 0; $i < 7; $i++)
                                             <tr>
                                                <td width="10%" style="font-weight: bold;vertical-align: middle;text-align: center;display: table-cell;">
                                                    Saturday
                                                </td>
                                                <td>
                                                    <ul class="classRouting">
                                                    @for($ie = 0; $ie < 8; $ie++)
                                                    <li>
                                                        <div class="items mb-1">
                                                            <p>
                                                                <i class="fas fa-book"></i> Endlish </p>
                                                            <p>
                                                                <i class="fas fa-clock"></i>
                                                                12:20 to 1:10</p>
                                                            <p>
                                                                <i class="fas fa-user"></i>
                                                                Korim Mia</p>
                                                        </div>
                                                    </li>
                                                    @endfor

                                                </ul>
                                                </td>
                                            </tr>
                                            @endfor
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop