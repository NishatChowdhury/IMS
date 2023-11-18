 <div class="skill-information-area section-gray section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="about-skill-text">
            <h2 class="text-wrap   text-info">
			<span style="color:{{ siteConfig('name_color') }};font-size:{{ siteConfig('name_size') }}px;font-family:{{ siteConfig('name_font') }};">Welcome to {{siteConfig('name') }}</span>
			 </h2>
			 @if($about)
             {!! strip_tags(Str::limit($about->body,800)) !!}
                     <a class="button-default button-yellow" style="color: blue" data-toggle="modal" data-target="#aboutModal" data-whatever="@mdo">{{ __('View More') }}</a> 
           
			@endif
            <!--<a href="#" class="button-default button-yellow">View More</a>-->
          </div>

          <div class="skill-bars">
            <div class="orange">
              <div class="skill-bar-item">
                <span>Science</span>
                <div class="progress">
                  <div class="progress-bar wow fadeInLeft" data-progress="80%" style="width: 80%;"
                    data-wow-duration="1.5s" data-wow-delay="1.2s">
                    <span class="text-top">80%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="lemon">
              <div class="skill-bar-item">
                <span>Arts </span>
                <div class="progress">
                  <div class="progress-bar wow fadeInLeft" data-progress="75%" style="width: 75%;"
                    data-wow-duration="1.5s" data-wow-delay="1.2s">
                    <span class="text-top">75%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="sea-green">
              <div class="skill-bar-item no-margin">
                <span>Commerce</span>
                <div class="progress no-margin">
                  <div class="progress-bar wow fadeInLeft" data-progress="90%" style="width: 90%;"
                    data-wow-duration="1.5s" data-wow-delay="1.2s">
                    <span class="text-top">90%</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="skill-image">
            <img src="img/banner/7.png" alt="" />
          </div>
        </div>

        <div class=" welcome-notice col-lg-2 col-md-6 py-2">
          <div class="item">
            <div class="notice-board">
              <div style="height: 350px; overflow: hidden;">
                <div class="title text-center"> Notice Board </div>
                <marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="scroll" scrollamount="3"
                  direction="up" style="height: 100%; background-color: rgb(178, 223, 111);">
                  <ul class="notice-items">
				     @foreach($notices as $notice)
                    <li style="cursor: pointer;">
                      <p style="cursor: pointer;">
                        <!----><a style="cursor: pointer;" href="{{ route('front.notice.details',$notice->id) }}" >{{ strip_tags($notice->title) }}</a></p>
                      <div class="date"><i class="fa fa-calendar"></i>
                       @if($notice->start)
                           {{ $notice->start->format('Y-m-d') ?? '' }}
                       @else
                        {{ $notice->created_at->format('Y-m-d') ?? ''}} 
                       @endif					
					  </div>
                    </li>
					@endforeach
                  </ul>
                </marquee>
              </div>
              <div class="load-more text-right"><a href="#" class="button-default button-yellow">View More</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModal" aria-hidden="true" style='margin:100'>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>{{ __('About Institute') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    @if($about)
                        <span aria-hidden="true">{!! $about->body !!}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>