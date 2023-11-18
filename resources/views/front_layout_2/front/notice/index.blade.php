@extends('layouts.front_gold')

@section('title','Notices')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2 class="text-white">{{ __('Notice')}}</h2>
                </div>
            
            </div>
        </div>
    </div>


    <section class="paddingTop-50 paddingBottom-100 bg-light-v2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mt-5 " id="data-wrapper">
                    {{--  show Data Here --}}
                    @foreach($notices as $key => $notice)
                        @php
                        if($notice->start != null){
                            $date = $notice->start->format('d');
                        }
                        if($notice->start != null){
                            $mm = $notice->start->format('M, Y');
                        }
                        if($notice->notice_type_id == 1){
                            $typeN = 'Notice';
                            $types = 'badge-danger';
                        }else{
                            $typeN = 'News';
                            $types = 'badge-info';
                        }
                        @endphp
                         <div class="d-md-flex justify-content-between align-items-center bg-white shadow-v1 rounded mb-4 py-4 px-5 hover:transformLeft">
                            <div class="media align-items-center">
                                <div class="text-center border-right pr-4  noticee">
                                <strong class="text-primary txt font-size-38">
                                            {{$date}}
                                </strong>
                                <p class="mb-0 text-gray">
                                    {{$mm}}
                                </p>
                                </div>
                                <div class="media-body p-4">
                                <p class="mb-1 text-gray">
                                <i class="ti-file"></i>
                                    <span class="badge {{$types}} ">
                                        {{$typeN}}
                                    </span>
                                </p>
                                <a href="{{ action('Front\FrontController@noticeDetails',$notice->id) }}" class="h5">
                                    {{$notice->title}}
                                </a>
                                </div>
                            </div>
                            @if($notice->file)
                           <a  href="{{ asset('assets/files/notice') }}/{{$notice->file}}" class="btn btn-outline-primary mr-5" target="_blank"><i class="fa fa-download"></i></a>
                            @endif
                            <a href=" {{ action('Front\FrontController@noticeDetails',$notice->id) }}" class="btn btn-outline-primary">Read More</a>
                            </div>

                    @endforeach

                <div>
                    {{ $notices->links() }}
                </div>

                </div>

                <div class="col-lg-3 mt-5">
                    <div class="card shadow-v1">
                        <div class="card-header border-bottom">
                            <h4 class="mb-0">{{ __('Notice & News List') }}</h4>
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
    {{--var ENDPOINT = "{{ url('/') }}";--}}
    {{--    var page = 1;--}}
    {{--    infinteLoadMore(page);--}}
    {{--    $(window).scroll(function () {--}}
    {{--        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {--}}
    {{--            page++;--}}
    {{--            infinteLoadMore(page);--}}
    {{--        }--}}
    {{--    });--}}
    {{--    function infinteLoadMore(page) {--}}
    {{--        $.ajax({--}}
    {{--                url: ENDPOINT + "/notice?page=" + page,--}}
    {{--                datatype: "html",--}}
    {{--                type: "get",--}}
    {{--                beforeSend: function () {--}}
    {{--                    $('.auto-load').show();--}}
    {{--                }--}}
    {{--            })--}}
    {{--            .done(function (response) {--}}
    {{--                if (response.length == 0) {--}}
    {{--                    $('.auto-load').html("We don't have more data to display :(");--}}
    {{--                    return;--}}
    {{--                }--}}
    {{--                $('.auto-load').hide();--}}
    {{--                $("#data-wrapper").append(response);--}}
    {{--                console.log(response);--}}
    {{--            })--}}
    {{--            .fail(function (jqXHR, ajaxOptions, thrownError) {--}}
    {{--                console.log('Server error occurred');--}}
    {{--            });--}}
    {{--    }--}}
</script>

@endsection