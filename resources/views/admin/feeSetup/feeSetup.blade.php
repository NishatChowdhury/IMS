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
                        <li class="breadcrumb-item"><a href="#">Fee Setup</a></li>
                        <li class="breadcrumb-item active">Add Fee</li>
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
                                            <input class="form-control" placeholder="Academic Class ID" name="academic_class_id" type="text">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Session ID</label>
                                        <div class="input-group">
                                            {{ Form::select('session_id',$session,null,['class'=>'form-control','placeholder'=>'Session ID']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Class ID</label>
                                        <div class="input-group">
                                            {{ Form::select('class_id',$classes,null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Group ID</label>
                                        <div class="input-group">
                                            {{ Form::select('group_id',$groups,null,['class'=>'form-control','placeholder'=>'Select Group']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Month</label>
                                        <div class="input-group">
                                            {{ Form::selectMonth('month_id',null,['class'=>'form-control','placeholder'=>'Select Month']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Year</label>
                                        <div class="input-group">
                                            {{ Form::selectYear('year',2001, 2100,null,['class'=>'form-control','placeholder'=>'Select Year']) }}
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
                        <div class="form-row">
                                <label for="">Fee Category</label>
                                <select class="form-control" id="fee_category_id" name="fee_category_id">--}}
                                    <option value="">Select Fee Category</option>
                                        @foreach($fee_category as $key=>$category)
                                            <option value="{{$key}}">{{$category}}</option>
                                        @endforeach
                                </select>
                            <br>
                            <br>
                                <label for="">Fee Amount</label>
                                <div class="input-group">
                                    <input class="form-control" placeholder="Amount here" name="amount[]" type="text">
                                </div>
                            <br>
                            <br>
                            <br>
                            <div class="button">
                                <button onclick="appendText()" type="submit" name="save" id="save" class="btn btn-primary">Add To Fee</button>
                            </div>
                            </div>
                        </div>
                </div>

                <div class="col-md-6">
                    <div class="" style="margin: 15px;">
                                <table class="table table-hover">
                                    <thead>
                                    <br>
                                    <h5 class="text-center">Tuition Fee</h5>
                                    <br>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Category</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>

                                    <tbody>
{{--                                        <tr>--}}
{{--                                            <td>1</td>--}}
{{--                                            <td>Book Fee</td>--}}
{{--                                            <td>200</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>2</td>--}}
{{--                                            <td>Transport Fee</td>--}}
{{--                                            <td>300</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>3</td>--}}
{{--                                            <td>Gadget Fee</td>--}}
{{--                                            <td>500</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td></td>--}}
{{--                                            <td><b>Subtotal:</b></td>--}}
{{--                                            <td><b>1000</b></td>--}}
{{--                                        </tr>--}}
                                    </tbody>

                                </table>
                                <div class="button text-center">
                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save Settings" />
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
    function appendText() {
        var txt1 = "<tr><td>123</td></tr>";       // Create text with HTML
        $("tbody").append(txt1);   // Append new elements
    }
</script>
@endsection
