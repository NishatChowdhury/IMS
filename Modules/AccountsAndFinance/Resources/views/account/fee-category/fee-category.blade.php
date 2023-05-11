@extends('accountsandfinance::layouts.master')

@section('title', 'Account | Fee Category')

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
                    <div class="card mb-2">
                        <div class="card-body" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('fee_categories.search') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <input type="text" name="searchQuery" placeholder="Search. . . . "
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group" style="float: left">
                                                    <button type="submit" class="btn btn-dark btn-sm">Search</button>
                                                    <a href="{{ route('fee-category.index') }}"
                                                        class="btn btn-primary btn-sm">Reload</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div style="float: left;">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="@mdo"
                                style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                New</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>SL</th>
                                        <th>{{ __('Category Name') }}</th>
                                        <th>{{ __('Short Description') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i= 1; @endphp
                                    @foreach ($fee_categories as $fee_category)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ ucwords($fee_category->name) }}</td>
                                            <td>{{ ucfirst($fee_category->description) }}</td>
                                            <td style="text-align: center;">
                                                {{ Form::open(['method' => 'PUT', 'url' => ['admin/fee-category/status/' . $fee_category->id], 'style' => 'display:inline']) }}
                                                @if ($fee_category->status == 1)
                                                    {{ Form::submit('Active', ['class' => 'btn btn-success btn-sm']) }}
                                                @else
                                                    {{ Form::submit('In Active', ['class' => 'btn btn-danger btn-sm']) }}
                                                @endif
                                                {{ Form::close() }}
                                            </td>
                                            <td style="text-align: center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#edit" onclick="loadEditForm({{ $fee_category->id }})"><i
                                                        class="fas fa-edit"></i></button>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['url' => 'admin/fee-category/store', 'method' => 'post']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Fee Category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Category
                                                                                                                                            Name*') }}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name', 'required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Description') }}*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Short Description']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-success  btn-sm"> <i
                            class="fas fa-plus-circle"></i>
                        Add</button></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

    <!-- ***/ Pop Up Model for Edit Session Class -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Update Fee Category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('assets/img/loader.gif') }}" alt="" id="loader"
                        style="display: none;margin:0 auto !important;">
                    {!! Form::open(['route' => 'fee-category.update', 'method' => 'post', 'id' => 'form']) !!}
                    {!! Form::hidden('id', null, ['id' => 'id']) !!}

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Category
                                                                                                                                            Name*') }}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class' => 'form-control name', 'placeholder' => 'Category Name']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Description') }}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('description', null, [
                                    'class' => 'form-control description',
                                    'placeholder' => 'Short Description',
                                ]) !!}
                            </div>
                        </div>
                    </div>


                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-plus-circle"></i> {{ __('Update') }}
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
        function loadEditForm(id) {
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ url('admin/fee-category/edit') }}",
                data: {
                    _token: token,
                    id: id
                },
                type: 'post'
            }).done(function(e) {
                $("#id").val(e.id);
                $(".name").val(e.name);
                $(".description").val(e.description);
                $("#edit-form").remove();
                $("#edit-model-header").after(e);
            })
        }
    </script>
@stop
