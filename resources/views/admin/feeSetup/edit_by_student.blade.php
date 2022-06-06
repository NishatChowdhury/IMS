@extends('layouts.fixed')

@section('title','Edit Fee Setup')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Fee Setup</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Fee Setup') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Edit Fee') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
{{--            {{dd($feeSetupStudent)}}--}}
            {{ Form::model($feeSetupStudent,['url'=>['admin/fee/fee-setup/update-by-student',$feeSetupStudent->id],'method'=>'patch', 'class'=>'form-horizontal']) }}
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <div class="input-group">
                                        <img src="{{ asset('assets/img/students') }}/{{ $feeSetupStudent->student->image ?? '' }}" alt="" width="75">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Name</label>
                                    <div class="input-group">
                                        <p>{{$feeSetupStudent->student->name}}</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Month') }}</label>
                                    <div class="input-group">
                                        <p>{{ $feeSetupStudent->feeSetup->month->name }}</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Year') }}</label>
                                    <div class="input-group">
                                        <p>{{ $feeSetupStudent->feeSetup->year }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="card col-md-6">
                    <div class="" style="margin: 15px;">
                        <div class="">
                            <div class="form-group">
                                <label for="">{{ __('Fee Category') }}</label>
                                <select class="form-control" id="fee_category_id" name="fee_category_id">
                                    <option value="">{{ __('Select Fee Category') }}</option>
                                    @foreach($fee_categories as $key => $category)
                                        <option value="{{$key}}">{{$category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Fee Amount') }}</label>
                                <div class="input-group">
                                    <input class="form-control" id="amount" placeholder="Amount here" name="amount" type="text">
                                </div>
                            </div>
                            <div class="button">
                                <button onclick="addToFee()" type="button" class="btn btn-primary">{{ __('Add To Fee') }}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="" style="margin: 15px;">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th><button onclick="clearFeeCart()" class="btn btn-sm btn-dark">{{ __('Clear All') }}</button></th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            <!-- Fee category list will appeared here -->
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $category->category->name }}</td>
                                    <td>{{$category['amount']}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="removeFeeFromEditCart({{ $key }},{{$category->category->id}},{{ $feeSetupStudent->id }})">
                                            <span class="fas fa-trash-alt"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="button text-center">
                            <button type="submit" class="btn btn-primary btn-sm">{{ __('Save') }}</button>
                        </div>

                        <!-- /.card -->
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </section>


@stop

@section('script')
    <script>
        function addToFee() {
            "use strict";
            var category_id = $("#fee_category_id").val();
            var amount = $("#amount").val();
            var token = "{{ @csrf_token() }}"
            $.ajax({
                url: "{{ url('admin/fee/fee-cart/store') }}",
                data: {_token:token,category_id:category_id,amount:amount},
                type: "POST",
            }).done(function(e){
                $("#tbody").html(e);
                console.log(e);
            });
        }

        function removeFeeFromCart(key){
            "use strict";
            var token = "{{ @csrf_token() }}"
            $.ajax({
                url: "{{ url('admin/fee/fee-cart/destroy') }}",
                data: {_token:token,key:key},
                type: "POST",
            }).done(function(e){
                $("#tbody").html(e);
                console.log(e);
            });
        }

        function clearFeeCart() {
            "use strict";
            var token = "{{ @csrf_token() }}"
            $.ajax({
                url: "{{ url('admin/fee/fee-cart/flush') }}",
                data: {_token:token},
                type: "POST",
            }).done(function(e){
                $("#tbody").html(e);
                console.log(e);
            });
        }

        function removeFeeFromEditCart(key,categoryId, feeStudentId){
            "use strict";
            var token = "{{ @csrf_token() }}"
            $.ajax({
                url: "{{ url('admin/fee/edit-fee-cart/destroy') }}",
                data: {_token:token,key:key,categoryId:categoryId,feeStudentId:feeStudentId},
                type: "POST",
            }).done(function(e){
                $("#tbody").html(e);
                console.log(e);
            });
        }
    </script>
@endsection
