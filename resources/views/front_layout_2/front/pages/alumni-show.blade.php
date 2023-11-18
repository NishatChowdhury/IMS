@extends('layouts.front_gold')

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
                <div class="col-8">
                    <p class="mb-2"><b>{{__('ব্যক্তিগত তথ্য')}}</b></p> <hr>
                    <ul>
                        <li>
                            <label for="">{{__('আবেদনের তারিখ:')}}</label>
                            <p><b>{{ __('01.01.2022') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('ফর্ম নং:')}}</label>
                            <p><b>{{ __('01') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('সদস্য নিবন্ধন নং:')}}</label>
                            <p><b>{{ __('01') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('নাম:')}}</label>
                            <p><b>{{ __('Mr. Name') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('পিতা/স্বামীর নাম:')}}</label>
                            <p><b>{{ __('Mr. Father') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('মাতা:')}}</label>
                            <p><b>{{ __('Mrs. Mother') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('জন্ম তারিখ:')}}</label>
                            <p><b>{{ __('01/01/2022') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('জাতীয় পরিচয় পত্র (NID) নং অথবা জন্মনিবন্ধন সনদ নং অথবা পাসপোর্ট নং:')}}</label>
                            <p><b>{{ __('12345') }}</b></p>
                        </li>
                    </ul>
                </div>
                <div class="col-8">
                    <p class="mb-2"><b>{{__('বর্তমান ঠিকানা')}}</b></p> <hr>
                    <ul>
                        <li>
                            <label for="">{{__('প্রতিষ্ঠানের নাম:')}}</label>
                            <p><b>{{ __('XYZ') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('পদবি:')}}</label>
                            <p><b>{{ __('Test Designation') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('ঠিকানা:')}}</label>
                            <p><b>{{ __('Test Address') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('মোবাইল নং:')}}</label>
                            <p><b>{{ __('01xxxxxxxxxxxx') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('ই-মেইল:')}}</label>
                            <p><b>{{ __('test@test.com') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('ইমু/ হোয়াটস্যাপ/ মেসেঞ্জার নং:')}}</label>
                            <p><b>{{ __('01xxxxxxxxxxxxx') }}</b></p>
                        </li>
                    </ul>
                </div>

                <div class="col-8">
                    <p class="mb-2"><b>{{__('স্থায়ী ঠিকানা')}}</b></p> <hr>
                    <ul>
                        <li>
                            <label for="">{{__('পাড়া:')}}</label>
                            <p><b>{{ __('Test') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('বাড়ির নাম:')}}</label>
                            <p><b>{{ __('Test') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{ __('গ্রাম:') }}</label>
                            <p><b>{{ __('Test') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('ডাকঘর:')}}</label>
                            <p><b>{{ __('Test') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('থানা/উপজেলা ')}}</label>
                            <p><b>{{ __('Test') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('জেলা:')}}</label>
                            <p><b>{{ __('Test') }}</b></p>
                        </li>
                    </ul>
                </div>
                <div class="col-8">
                    <p class="mb-2"><b>{{__('অফিস কতৃক পূরণীয়')}}</b></p> <hr>
                    <ul>
                        <li>
                            <label for="">{{__('নাম:')}}</label>
                            <p><b>{{ __('Test Name') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('ফর্ম নং:')}}</label>
                            <p><b>{{ __('01') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('সদস্য নিবন্ধন নং:')}}</label>
                            <p><b>{{ __('01') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('তারিখ:')}}</label>
                            <p><b>{{ __('01/01/2022') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('প্রাথমিক সদস্য ফী:')}}</label>
                            <p><b>{{ __('2000') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('মাসিক চাঁদা:')}}</label>
                            <p><b>{{ __('500') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('প্রাথমিক সদস্য ফী ও চাঁদা আদায় রশিদ বই নং:')}}</label>
                            <p><b>{{ __('0110') }}</b></p>
                        </li>
                        <li>
                            <label for="">{{__('রশিদ নং')}}</label>
                            <p><b>{{ __('01') }}</b></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@stop