@extends('layouts.fixed')

@section('title','Fee Setup')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fee Setup</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Fee Setup') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Add Fee') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <!-- form start -->
                        {{ Form::open(['method'=>'POST', 'class'=>'form-horizontal','id'=>'dynamic_form']) }}

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Academic Class ID</label>
                                    <div class="input-group">
                                        {{ Form::select('academic_class_id',$classes,null,['class'=>'form-control','placeholder'=>'Academic Class ID']) }}
                                    </div>
                                </div>
                                {{--                                    <div class="col">--}}
                                {{--                                        <label for="">Session ID</label>--}}
                                {{--                                        <div class="input-group">--}}
                                {{--                                            {{ Form::select('session_id',$session,null,['class'=>'form-control','placeholder'=>'Session ID']) }}--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col">--}}
                                {{--                                        <label for="">Class ID</label>--}}
                                {{--                                        <div class="input-group">--}}
                                {{--                                            {{ Form::select('class_id',$classes,null,['class'=>'form-control','placeholder'=>'Select Class']) }}--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col">--}}
                                {{--                                        <label for="">Group ID</label>--}}
                                {{--                                        <div class="input-group">--}}
                                {{--                                            {{ Form::select('group_id',$groups,null,['class'=>'form-control','placeholder'=>'Select Group']) }}--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                <div class="col">
                                    <label for="">{{ __('Month') }}</label>
                                    <div class="input-group">
                                        {{ Form::selectMonth('month_id',null,['class'=>'form-control','placeholder'=>'Select Month']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Year') }}</label>
                                    <div class="input-group">
                                        {{ Form::selectYear('year',now()->subYear()->format('Y'),now()->addYear()->format('Y'),null,['class'=>'form-control','placeholder'=>'Select Year']) }}
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{ Form::close() }}
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
                                <select class="form-control" id="fee_category_id" name="fee_category_id">--}}
                                    <option value="">{{ __('Select Fee Category') }}</option>
                                    @foreach($fee_category as $key => $category)
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
                        {{--                        <h5 class="text-center">{{ __('Tuition Fee') }}</h5>--}}
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Amount') }}</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                        <div class="button text-center">
{{--                            <input type="submit" name="save" id="save" class="btn btn-primary" value="Save Settings" />--}}
                            <button class="btn btn-primary btn-sm">{{ __('Save') }}</button>
                        </div>

                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{--    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>--}}
    {{--    <script>--}}
    {{--        $(document).ready(function(){--}}

    {{--            var count = 1;--}}

    {{--            dynamic_field(count);--}}

    {{--            function dynamic_field(number)--}}
    {{--            {--}}
    {{--                html = '<tr>';--}}
    {{--                html += '<td><select class="form-control" id="fee_category_id" name="fee_category_id"><option value="">Select Fee Category</option>@foreach($fee_category as $key=>$category)<option value="{{$key}}">{{$category}}</option>@endforeach</select></td>';--}}
    {{--                html += '<td><input type="text" name="amount[]" class="form-control length" /></td>';--}}

    {{--                if(number > 1)--}}
    {{--                {--}}
    {{--                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';--}}
    {{--                    $('tbody').append(html);--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';--}}
    {{--                    $('tbody').html(html);--}}
    {{--                }--}}
    {{--            }--}}

    {{--            $(document).on('click', '#add', function(){--}}
    {{--                count++;--}}
    {{--                dynamic_field(count);--}}
    {{--            });--}}

    {{--            $(document).on('click', '.remove', function(){--}}
    {{--                count--;--}}
    {{--                $(this).closest("tr").remove();--}}
    {{--            });--}}

    {{--            $('#dynamic_form').on('submit', function(event){--}}
    {{--                event.preventDefault();--}}
    {{--                $.ajax({--}}
    {{--                    url:'{{ route("fee-setup.feeSetupStore") }}',--}}
    {{--                    method:'post',--}}
    {{--                    data:$(this).serialize(),--}}
    {{--                    dataType:'json',--}}
    {{--                    beforeSend:function(){--}}
    {{--                        $('#save').attr('disabled','disabled');--}}
    {{--                    },--}}
    {{--                    success:function(data)--}}
    {{--                    {--}}
    {{--                        if(data.error)--}}
    {{--                        {--}}
    {{--                            var error_html = '';--}}
    {{--                            for(var count = 0; count < data.error.length; count++)--}}
    {{--                            {--}}
    {{--                                error_html += '<p>'+data.error[count]+'</p>';--}}
    {{--                            }--}}
    {{--                            $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');--}}
    {{--                        }--}}
    {{--                        else--}}
    {{--                        {--}}
    {{--                            dynamic_field(1);--}}
    {{--                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');--}}
    {{--                        }--}}
    {{--                        $('#save').attr('disabled', false);--}}
    {{--                    }--}}

    {{--                })--}}
    {{--            });--}}

    {{--        });--}}
    {{--    </script>--}}
    <script>
        function addToFee() {
            var cat = $("#fee_category_id").val();
            var amount = $("#amount").val();
            sessionStorage.setItem('thekey',JSON.stringify([cat,amount]));
            console.log(sessionStorage.thekey);
            $("#tbody").append(
                '<tr><td></td><td>'+cat+'</td><td>'+amount+'</td></tr>'
            );
        }
    </script>
@endsection
