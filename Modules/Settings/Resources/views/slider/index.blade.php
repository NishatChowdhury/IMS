@extends('settings::layouts.master')

@section('title', 'Settings | Slider')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Slider') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Slider') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Slider page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-danger">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="container">
                            <h4 class="modal-title" id="exampleModalLabel" style="padding: 20px">{{ __('Add Slider') }}</h4>
                            {{ Form::open(['route' => 'slider.store', 'method' => 'post', 'files' => 'true']) }}
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"
                                    style="font-weight: 500; text-align: right">{{ __('Title*') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{ Form::text('title', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"
                                    style="font-weight: 500; text-align: right">{{ __('Short Description*') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"
                                    style="font-weight: 500; text-align: right">{{ __('Start Date') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{ Form::text('start', null, ['class' => 'form-control datePicker']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"
                                    style="font-weight: 500; text-align: right">{{ __('End Date') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{ Form::text('end', null, ['class' => 'form-control datePicker']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"
                                    style="font-weight: 500; text-align: right">{{ __('Upload Image*') }}</label>
                                <div class="col-sm-8">
                                    <div class="form-group slim" data-ratio="12:5" data-max-file-size="2" data-instant-edit="true">
                                        <input type="file" name="image" class="form-control" multiple="">
                                    </div>
                                </div>
                            </div>
                            <div style="float: right;padding-bottom: 50px">
                                <button type="submit" class="btn btn-success"> <i class="fas fa-plus-circle"></i>
                                    {{ __('Submit') }}</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="container">
                            <h4 class="modal-title" id="exampleModalLabel" style="padding: 20px">{{ __('All Slider') }}</h4>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Duration') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>{{ $slider->start }}<br>{{ $slider->end }}</td>
                                    <td>
                                        <img src="{{ asset('storage/uploads/sliders/') }}/{{ $slider->image }}" width="100" alt="">
                                     </td>
                                    <td>
                                        <form  action="{{route('slider.destroy',$slider->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="right gap-items-2">
                                                <button class="btn btn-danger btn-sm" name="archive" type="submit" onclick="archiveFunction()"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </form>
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
@stop
<!-- /Slider page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop


@section('script')
    <script>
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });

        // delete slider
        function archiveFunction(event) {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form

            if (!form) {
                console.error("Form is undefined. Check your HTML structure.");
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this slider!!!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            });
        }

    </script>
@stop
