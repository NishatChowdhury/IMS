@extends('layouts.front-inner')

@section('title','Member Add form')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>{{ __('Member Add form')}}</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __('Member Add form') }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <p class="mb-2"><b>{{__('ব্যক্তিগত তথ্য')}}</b></p> <hr>
                    <ul>
                        <li>
                            <label for="">{{__('আবেদনের তারিখ:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('ফর্ম নং:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('সদস্য নিবন্ধন নং:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('নাম:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('পিতা/স্বামীর নাম:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('মাতা:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('জন্ম তারিখ:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('জাতীয় পরিচয় পত্র (NID) নং অথবা জন্মনিবন্ধন সনদ নং অথবা পাসপোর্ট নং:')}}</label>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <p class="mb-2"><b>{{__('বর্তমান ঠিকানা')}}</b></p> <hr>
                    <ul>
                        <li>
                            <label for="">{{__('প্রতিষ্ঠানের নাম:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('পদবি:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('ঠিকানা:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('মোবাইল নং:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('ই-মেইল:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('ইমু/ হোয়াটস্যাপ/ মেসেঞ্জার নং:')}}</label>
                        </li>
                    </ul>
                </div>

                <div class="col-4">
                    <p class="mb-2"><b>{{__('স্থায়ী ঠিকানা')}}</b></p> <hr>
                    <ul>
                        <li>
                            <label for="">{{__('পাড়া:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('বাড়ির নাম:')}}</label>
                        </li>
                        <li>
                            <label for="">{{ __('গ্রাম:') }}</label>
                        </li>
                        <li>
                            <label for="">{{__('ডাকঘর:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('থানা/উপজেলা ')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('জেলা:')}}</label>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <p class="mb-2"><b>{{__('অফিস কতৃক পূরণীয়')}}</b></p> <hr>
                    <ul>
                        <li>
                            <label for="">{{__('নাম:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('ফর্ম নং:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('সদস্য নিবন্ধন নং:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('তারিখ:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('প্রাথমিক সদস্য ফী:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('মাসিক চাঁদা:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('প্রাথমিক সদস্য ফী ও চাঁদা আদায় রশিদ বই নং:')}}</label>
                        </li>
                        <li>
                            <label for="">{{__('রশিদ নং')}}</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@stop