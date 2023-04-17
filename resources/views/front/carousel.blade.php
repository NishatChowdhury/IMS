<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($sliders as $key => $slider)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $slider->active == 1 ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach($sliders as $key => $slider)
            <div class="carousel-item padding-y-80 height-90vh {{ $key == 0 ? 'active' : '' }}">
                <div class="bg-absolute" data-dark-overlay="4" style="background:url('{{ asset('storage/uploads/slider/') }}/{{ $slider->image }}') no-repeat"></div>
            </div>
        @endforeach
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
        <li>@if($notice->start)[{{ $notice->start->format('Y-m-d') }}]@endif<a href="{{ route('front.notice.details',$notice->id) }}">&nbsp;{{ $notice->title }}</a></li>
        @endforeach
    </ul>
</marquee>

@section('style')
    <style>
        marquee ul {
            margin: .5rem;
        }

        marquee ul li {
            /*float: left !important;*/
            display: inline-block;
            padding-right: 1.5rem;
            list-style: disclosure-closed inside;
            color: green;
            font-weight: bold;
        }

        .car-height{
            min-height: 100% !important;
        }

    </style>
@stop
