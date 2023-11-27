<div class="members-messages">
    <div class="container">
      <div class="title">
        <h2>Message</h2>
      </div>
      <div class="row">
        <div class="py-2 py-md-4 col-lg-6">
          <div class="member d-flex">
            <div class="thumb rounded overflow-hidden"><img alt="Chairman" class="img-fluid" src="{{ asset('storage/uploads/message') }}/{{ $chairman->image ?? 'untitled.png' }}">
            </div>
            <div class="info">
              <div class="designation"> {{ $chairman->title ?? 'Chairman Message' }} <span></span></div>
              <div class="name">কমান্ডার মাহবুব আহমদ শাহজালাল, (শিক্ষা), বিএন </div>
              <p style="max-height: 210px; overflow: hidden;">
                <div style="">
                  <font face="tahoma, arial, verdana, sans-serif"> {!! $chairman->body !!}</font>
                </div>

              </p>
              <a style="cursor: pointer;" class="button-default button-yellow">Read More..</a>

            </div>
          </div>
        </div>
        <!---->
        <div class="py-2 py-md-4 col-lg-6">
          <div class="member d-flex">
            <div class="thumb rounded overflow-hidden"><img alt="Chairman" class="img-fluid" src="img/teacher/6.jpg">
            </div>
            <div class="info">
              <div class="designation"> {{ $principal->title ?? 'Principal Message' }} <span></span>
              </div>
              <div class="name"> কমান্ডার মাহবুব আহমদ শাহজালাল, (শিক্ষা), বিএন </div>
              <p style="max-height: 210px; overflow: hidden;">
                <div style="font-family: Tahoma; margin: 5px;">
                  <font face="tahoma, arial, verdana, sans-serif">বিসমিল্লাহির রাহমানির রাহিম।</font>
                </div>
                <div style="font-family: Tahoma;">
                  <font face="tahoma, arial, verdana, sans-serif">{!! $principal->body !!}</font>
                </div>
              </p>
              <a style="cursor: pointer;" class="button-default button-yellow">Read More..</a>
            </div>
          </div>
        </div>
        <!---->
        <!---->
      </div>
    </div>
  </div>