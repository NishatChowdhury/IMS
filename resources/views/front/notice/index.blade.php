@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Notice</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Elements</a>
                        </li>
                        <li class="breadcrumb-item">
                            About us
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="paddingTop-50 paddingBottom-100 bg-light-v2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mt-5 " id="data-wrapper">
                    {{--  show Data Here --}}
                </div>

                <div class="col-lg-3 mt-5">
                    <div class="card shadow-v1">
                        <div class="card-header border-bottom">
                            <h4 class="mb-0">Notice & News List</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach($categories as $category)
                                    <li class="mb-3"><a href="">{{ $category->name }} ({{ $category->notices->count() }})</a></li>
                                @endforeach
                               
                            </ul>
                        </div>
                    </div>

                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>










@stop


@section('script')

<script>
    var ENDPOINT = "{{ url('/') }}";
        var page = 1;
        infinteLoadMore(page);
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                infinteLoadMore(page);
            }
        });
        function infinteLoadMore(page) {
            $.ajax({
                    url: ENDPOINT + "/page/notice?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function () {
                        $('.auto-load').show();
                    }
                })
                .done(function (response) {
                    if (response.length == 0) {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    $('.auto-load').hide();
                    $("#data-wrapper").append(response);
                    console.log(response);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
</script>

@endsection