 <div class="banner-slider">
    <div class="container">
      <div class="news-block d-flex flex-wrap flex-md-nowrap align-items-center">
        <div class="info d-flex align-items-center">
          <div class="title"> News </div>
          <div class="message">
            <marquee style="display: flex; height: 25px;" onmouseover='this.stop();' onmouseout='this.start();'>
              <ul class="msg-items d-flex align-items-center">
                @foreach($notices as $notice)
                  <li>@if($notice->start)[{{ $notice->start->format('Y-m-d') }}]@endif<a href="{{ route('front.notice.details',$notice->id) }}">&nbsp;{{ $notice->title }}</a></li>
                @endforeach
              </ul>
            </marquee>
          </div>
        </div>
      </div>
      <!--Slider Area Start-->
      <div class="slider-area slider-two-area">
        <div class="preview-2">
          <div id="nivoslider" class="slides">
            @foreach($sliders as $key => $slider)
            <img src="{{ asset('storage/uploads/sliders/') }}/{{ $slider->image }}" class="d-block w-100" alt="{{ $slider->title }}">
            @endforeach
          </div>
          <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-2">
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-md-7">
                    <div class="text-content hidden-xs">
                      <p class="sub-title">Your Child can be a genius</p>
                      <h1 class="title1">Fun &amp; Learning</h1>
                      <div class="banner-readmore">
                        <a title="Read more" href="#">Enroll your child</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-2 slider-right">
              <div class="container">
                <div class="row">
                  <div class="ml-auto col-lg-7 col-md-7">
                    <div class="text-content hidden-xs">
                      <p class="sub-title">Your Child can be a genius</p>
                      <h1 class="title1">Fun &amp; Learning</h1>
                      <div class="banner-readmore">
                        <a title="Read more" href="#">Enroll your child</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End  Slider Area-->

    </div>
  </div>