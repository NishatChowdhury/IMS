@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Notice</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Elements</a>
                        </li>
                        <li class="breadcrumb-item">
                            About us
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">

                <table class="table-bordered">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notices as $notice)
                        <tr>
                            <td></td>
                            <td>{{ $notice->start }}</td>
                            <td>{{ $notice->title }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop