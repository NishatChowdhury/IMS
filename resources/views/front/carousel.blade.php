<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($sliders as $key => $slider)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $slider->active == 1 ? 'active' : '' }}"></li>
        @endforeach
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>--}}
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>--}}
    </ol>

    <div class="carousel-inner">
        @foreach($sliders as $key => $slider)
            <div class="carousel-item padding-y-80 height-90vh {{ $key == 0 ? 'active' : '' }}">
                <div class="bg-absolute" data-dark-overlay="0" style="background:url('{{ asset('assets/img/sliders') }}/{{ $slider->image }}') no-repeat"></div>
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-10 mx-auto text-center text-white">--}}
                            {{--<h1 class="display-lg-3 font-weight-bold animated slideInUp">--}}
                                {{--{{ $slider->title }}--}}
                            {{--</h1>--}}
                            {{--<p class="lead animated fadeInUp">--}}
                                {{--{{ $slider->description }}--}}
                            {{--</p>--}}
                            {{--<a href="{{ $slider->redirect_url }}" class="btn btn-primary mt-3 mx-2 animated slideInUp">{{ $slider->button_text }}</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        @endforeach
        {{--<div class="carousel-item padding-y-80 height-90vh active">--}}
            {{--<div class="bg-absolute" data-dark-overlay="4" style="background:url({{ asset('assets/img/1920x800/1.jpg') }}) no-repeat"></div>--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-10 mx-auto text-center text-white">--}}
                        {{--<h1 class="display-lg-3 font-weight-bold animated slideInUp">--}}
                            {{--WP School--}}
                        {{--</h1>--}}
                        {{--<p class="lead animated fadeInUp">--}}
                            {{--This modern and inviting academic template is perfectly suited for school, colleges, university, on-line course, and other educational institutions.--}}
                        {{--</p>--}}
                        {{--<a href="#" class="btn btn-primary mt-3 mx-2 animated slideInUp">Learn More</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="carousel-item padding-y-80 height-90vh">--}}
            {{--<div class="bg-absolute" data-dark-overlay="4" style="background:url({{ asset('assets/img/1920x800/2.jpg') }}) no-repeat"></div>--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-10 mx-auto text-center text-white">--}}
                        {{--<h1 class="display-lg-3 font-weight-bold animated slideInUp">--}}
                            {{--WP School--}}
                        {{--</h1>--}}
                        {{--<p class="lead animated fadeInUp">--}}
                            {{--This modern and inviting academic template is perfectly suited for school, colleges, university, on-line course, and other educational institutions.--}}
                        {{--</p>--}}
                        {{--<a href="#" class="btn btn-primary mt-3 mx-2 animated slideInUp">Learn More</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="ti-angle-left iconbox bg-black-0_5 hover:primary"></i>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i class="ti-angle-right iconbox bg-black-0_5 hover:primary"></i>
    </a>
</div>
<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
    <ul>
        @foreach($notices as $notice)
        <li><a href="{{ action('FrontController@noticeDetails',$notice->id) }}">{{ $notice->title }}</a>@if($notice->start)[{{ $notice->start->format('Y-m-d') }}]@endif</li>
        @endforeach
    </ul>
</marquee>

@section('style')
    <style>
        marquee ul li {
            float: left;
            padding-right: 1.5rem;
            list-style: disclosure-closed inside;
            color: green;
            font-weight: bold;
        }
    </style>
@stop
