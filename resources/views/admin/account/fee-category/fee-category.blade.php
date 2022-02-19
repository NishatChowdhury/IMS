@extends('layouts.fixed')

@section('title','Account | Fee Category')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Add New Category') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Account') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Fee Category') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> </button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Short Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $i= 1; @endphp
                                    @foreach($fee_categories as $fee_category)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ucwords($fee_category->name)}}</td>
                                            <td>{{ucfirst($fee_category->description)}}</td>
                                            <td style="text-align: center;">
                                                {{ Form::open(['method'=>'PUT','url'=>['admin/fee-category/status/'.$fee_category->id],'style'=>'display:inline']) }}
                                                    @if($fee_category->status == 1)
                                                        {{ Form::submit('Active',['class'=>'btn btn-success btn-sm']) }}
                                                    @else
                                                        {{ Form::submit('In Active',['class'=>'btn btn-danger btn-sm']) }}
                                                    @endif
                                                {{ Form::close() }}
                                            </td>
                                            <td style="text-align: center">
                                                <a type="button" class="btn btn-warning btn-sm edit" value='{{$fee_category->id}}'
                                                   style="margin-left: 10px;"> <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Fee Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['url'=>'admin/fee-category/store', 'method'=>'post']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Category Name*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Category Name','required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Description*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Short Description']) !!}
                            </div>
                        </div>
                    </div>


                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

    <!-- ***/ Pop Up Model for Edit Session Class -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Fee Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('assets/img/loader.gif') }}" alt="" id="loader" style="display: none;margin:0 auto !important;">
                    {!! Form::open(['action'=>'Backend\FeeCategoryController@update_fee_category', 'method'=>'post','id'=>'form']) !!}
                    {!! Form::hidden('id', null, ['id'=>'id']) !!}

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Category Name*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class'=>'form-control name', 'placeholder'=>'Category Name']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Description</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('description', null, ['class'=>'form-control description', 'placeholder'=>'Short Description']) !!}
                            </div>
                        </div>
                    </div>


                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-plus-circle"></i> Update
                        </button>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->
@stop


@section('script')
    <script>
        $(document).on('click', '.edit', function () {
            $("#edit").modal("show");
            $("#form").hide();
            $("#loader").show();
            var id = $(this).attr('value');

            $.ajax({
                method:"post",
                url:"{{ url('fee-category/edit')}}",
                data:{id:id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){
                    $("#loader").hide();
                    $("#form").show();
                    console.log(response);
                    $("#id").val(response.id);
                    $(".name").val(response.name);
                    $(".description").val(response.description);


                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>
@stop
