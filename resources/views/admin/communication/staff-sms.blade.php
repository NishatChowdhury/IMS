@extends('layouts.fixed')

@section('title', 'Communication | Staff SMS')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Staff SMS <small style="color:deeppink">This page is in maintenance mode</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Communication</a></li>
                        <li class="breadcrumb-item active"> Staff SMS</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::open(['action'=>'CommunicationController@staff','method'=>'get']) }}
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="">Staff Type</label>
                                    <div class="input-group">
                                        <select class="form-control" name="staff_type_id">
                                            <option selected="selected" value="2">Teacher</option>
                                            <option value="1">Staff</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}

                {{ Form::open(['action'=>'CommunicationController@send','method'=>'post']) }}
                <!-- description -->
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-5">
                                    <label for="">SMS Description</label>
                                    <div class="input-group">
                                        {{ Form::hidden('group','staff') }}
                                        <textarea class="form-control descriptionLen" rows="5"  placeholder="type sms here.." name="description" cols="50"></textarea>
                                        {{ Form::submit('SEND',['class'=>'btn btn-primary']) }}

                                    </div>
                                    <p style="display: inline-block;padding: 5px;margin: 10px 0 0 0" class="bg-primary;"> Total Word Count :
                                        <span class="length" style="display: inline-block"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list -->
                    <div class="card">
                        <div class="card-body">
                            <label for=""> Staff List </label>
                            <table id="" class="table table-bordered" style=>
                                <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" checked id="select_all_head">
                                            <label class="form-check-label" for="exampleCheck1">Select All</label>
                                            <span style="color:blue">Selected:<span id="check-box-length"></span></span>
                                        </div>
                                    </td>
                                </thead>
                                <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td>
                                        {{ Form::checkbox('id[]',$staff->id,true,['class'=>'checkbox']) }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('assets/img/staffs') }}/{{ $staff->image }}" alt="" height="75">
                                    </td>
                                    <td>
                                        ID: {{ $staff->card_id }}<br>
                                        Name: {{ $staff->name }}<br>
                                        Designation: {{ $staff->title }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>





@stop

@section('script')
    <script>
        function counter(){
            var text = $('.descriptionLen').val();
            $(".length").text(text.length+1);
        }
        $(document).on('keydown change','.descriptionLen',function () {
            counter();
        });
    </script>

    <script>
        $(document).change(function(){
            //var total = $("input[type=checkbox]:checked").length;
            var total = $(".checkbox:checked").length;
            // if($("#select_all_head").is(':checked') || $("#select_all_foot").is(':checked')){
            //     total = total - 2;
            // }
            $("#check-box-length").html(total);
        });
        $(document).ready(function(){
            var total = $(".checkbox:checked").length;
            // var total = $("input[type=checkbox]:checked").length;
            $("#check-box-length").html(total);
        });
    </script>
@endsection
