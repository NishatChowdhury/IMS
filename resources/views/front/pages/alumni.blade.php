@extends('layouts.front-inner')

@section('title','Alumni Registration')

@section('content')
    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2></h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __('Institute') }} </a>
                        </li>
                        <li class="breadcrumb-item">{{ __('Alumni Registration') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <h2 class="text-center">{{ siteConfig('name') }}</h2>
                    <h4 class="text-center">{{ siteConfig('address') }}</h4>
                    <h5 class="text-center">{{ __('Alumni Registration Form') }}</h5>
                    <div class="alert alert-primary" role="alert">
                        {{ __('Print existing submitted form ') }} <a href="{{ route('alumni.login') }}" class="alert-link">{{ __('here')}}</a>.
                    </div>
                </div>
                <form action="{{ route('alumni.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 my-2 alert border border-secondary">
                                <h4 class="mb-4">
                                    {{ __('শিক্ষা সনদ ও জাতীয় পরিচয়পত্র অনুযায়ী') }}
                                </h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('নাম') }}</label>
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-bold">{{ __('পিতা/স্বামী') }}</label>
                                            <input type="text" name="father" class="form-control">
                                            @error('father')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('মাতা') }}</label>
                                            <input type="text" name="mother" class="form-control">
                                            @error('mother')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ __('জন্ম তারিখ') }}</label>
                                            <input name="dob" type="text" class="form-control">
                                            @error('dob')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('জাতীয় পরিচয়পত্র') }}</label>
                                            <input name="nid" type="text" class="form-control">
                                            @error('nid')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('মাদ্রাসায় সর্বশেষ অধ্যানকালিন বিবরণ') }}</label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <label>{{ __('শ্রেণি') }}</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="class" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>{{ __('পাসের সন') }}</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="passing_year" type="text" class="form-control">
                                                </div>
                                            </div>
                                            @error('class')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                            @error('passing_year')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row form-group">
                                            <label for="image" class="text-center"><img src="{{ asset('assets/img/230x230-avatar.jpg') }}" alt=""><br>{{ __('ছবি আপলোড করুন') }}</label>
                                            <div class="col-10">
                                                <input type="file" name="image" id="image" class="d-none">
                                                @error('image')
                                                <small class="form-text text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-2 alert border border-secondary">
                                <h4 class="mb-4">
                                    {{ __('বর্তমান যোগাযোগ ঠিকানা') }}
                                </h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('প্রতিষ্ঠানের নাম') }}</label>
                                            <input name="institute" type="text" class="form-control">
                                            @error('institute')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('মোবাইল') }}</label>
                                            <input name="mobile" type="text" class="form-control">
                                            @error('mobile')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('পদবী') }}</label>
                                            <input name="designation" type="text" class="form-control">
                                            @error('designation')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('ইমেইল') }}</label>
                                            <input name="email" type="text" class="form-control">
                                            @error('email')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('ঠিকানা') }}</label>
                                            <input name="address" type="text" class="form-control">
                                            @error('address')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('ইমু/হুয়াটসএপ/মেসেঞ্জার') }}</label>
                                            <input name="social" type="text" class="form-control">
                                            @error('social')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-2 alert border border-secondary">
                                <h4 class="mb-4">{{ __('স্থায়ী ঠিকানা') }}</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>পাড়া</label>
                                            <input name="pada" type="text" class="form-control">
                                            @error('pada')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('ডাকঘর') }}</label>
                                            <input name="po" type="text" class="form-control">
                                            @error('po')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('বাড়ির নাম') }}</label>
                                            <input name="badi" type="text" class="form-control">
                                            @error('badi')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('থানা') }}</label>
                                            <input name="ps" type="text" class="form-control">
                                            @error('ps')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('গ্রাম') }}</label>
                                            <input name="village" type="text" class="form-control">
                                            @error('village')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('জেলা') }}</label>
                                            <input name="district" type="text" class="form-control">
                                            @error('district')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-2 alert border border-secondary">
                                <h4 class="mb-4">
                                    {{ __('রেজিস্ট্রেশন ফি') }}
                                </h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul>
                                            <li>{{ __('রেজিস্ট্রেশন ফি ১,০০০/- টাকা মাত্র। ') }}</li>
                                            <li>{{ __('01711 XXXXXX নাম্বারে ১,০২০/- টাকা বিকাশ করুন অথবা ইসলামি ব্যাঙ্কের ০০০০০ এই অ্যাকাউন্টে ১,০০০/- টাকা জমা দিন। ') }}</li>
                                            <li>{{ __('বিকাশের ক্ষেত্রে বিকাশ মোবাইল নাম্বার ও টিআরএক্স আইডি উক্ত ফর্মে প্রদান করুন।') }}</li>
                                            <li>{{ __('ব্যাংক ট্রান্সফার এর ক্ষেত্রে ... ') }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('বিকাশ নাম্বার') }}</label>
                                            <input name="bkash" type="text" class="form-control">
                                            @error('dob')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('টিআরএক্স আইডি') }}</label>
                                            <input name="trxid" type="text" class="form-control">
                                            @error('dob')
                                            <small class="form-text text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                            </div>
                        </div> <!-- END row-->
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">{{ __('SUBMIT') }}</button>
                    </div>
                </form>

            </div>
        </div> <!-- END row-->
    </section>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Download Your Application Form')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="downloadForm" method="get">
                    @csrf
                    <div class="modal-body row">
                        <div class="form-group col-12">
                            <label for="">{{ __('Application ID')}}</label>
                            <input type="text" id="applicationID" name="id" class="form-control" placeholder="Enter Application ID">
                            <hr>
                            <button type="submit"  class="btn btn-primary btn-sm">{{ __('Download')}}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('script')
    <script>

        $('#applcationID').keyup(function(){
            let id = $('#applcationID').val();
            let action = "{{ url('download-school-pdf') }}/"+id;
            $('#downloadForm').attr('action', action);
        });


    </script>
@endsection