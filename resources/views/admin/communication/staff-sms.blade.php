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
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="">Staff Type</label>
                                    <div class="input-group">
                                        <select class="form-control" name="class_id">
                                            <option selected="selected" value="">Teacher</option>
                                            <option selected="selected" value="">Staff</option>
                                            <option selected="selected" value="">Assistant</option>
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
                    {{--description--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-5">
                                            <label for="">SMS Description</label>
                                            <div class="input-group">
                                                <textarea class="form-control descriptionLen" rows="5"  placeholder="type sms here.." name="description" cols="50"></textarea>

                                            </div>
                                            <p style="display: inline-block;padding: 5px;margin: 10px 0 0 0" class="bg-primary;"> Total Word Count :
                                            <div class="length" style="display: inline-block"></div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--list--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <label for=""> Staff List </label>
                                    <table id="" class="table table-bordered" style=>
                                        <thead>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Select All</label>
                                                </div>
                                            </td>
                                            <th>Staff ID</th>
                                            <th>Staff Image</th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                <img src="" alt="">
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

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
@endsection