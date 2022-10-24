@extends('layouts.front-inner')

@section('title','Payment')
@section('style')
    <style>
        .success-card h1{
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }.success-card p{
             color: #404F5E;
             font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
             font-size:20px;
             margin: 0;
         }
        .success-card i{
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left:-15px;
        }
        .success-card {
            background: #f2f2f2;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            cursor: pointer;
        }
        .success-card:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }

    </style>
@endsection

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Payment Successfully</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            Payment Success
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <div class="card success-card">
                        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                            <i class="checkmark">✓</i>
                        </div>
                        <h1 class="success_header">Success</h1>
                        <p>Your payment was successfully done;<br/> we'll be in touch shortly!</p>
                        <a  href="{{ route('download.school.form',$onlineAdmission->password) }}" class="mt-4 btn btn-dark btn-block">Download Form</a>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
@stop

