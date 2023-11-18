<div class="footer-widget-container section-padding ">
        <div class="row">
          <div class="col-lg-4 col-md-2 col-sm-4">
            <div class="single-footer-widget">
              <img src="{{asset('assets/front_gold/img/logo/logo.png')}}" alt="">
              <ul class="footer-widget-list ">
                <p>WP-IMS is a latest technology of educational institute’s digitization. This is the fastest and most
                  intelligent application ever made in Bangladesh.</p>

              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-2 col-sm-4">
            <div class="single-footer-widget ">
              <h4>Links</h4>
              <ul class="footer-widget-list ">
			     @foreach(importantLinks() as $link)
                <li><a href="{{ $link->link }}">{{ $link->title }}</a></li>
				 @endforeach
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-2 col-sm-4">
            <div class="single-footer-widget">
              <h4>Contact Us</h4>
              <ul class="footer-widget-list fwl">

                <li class="list-inline-item"><a class="iconbox   mr-3  mt-2" href="#" target="_blank"><i
                      class="fa fa-phone  " aria-hidden="true" style=" color: #f9f9f9;font-size: 16px; "></i> </a><a
                    href="tel:{{ siteConfig('phone') }}">{{ siteConfig('phone') }}</a>
				</li>
                <li class="list-inline-item"><a class="iconbox   mr-3  mt-2" href="#" target="_blank"><i
                      class="fa fa-envelope  " aria-hidden="true" style=" color: #ffffff;font-size: 16px; "></i></a> <a
                    href="mailto:{{ siteConfig('email') }}">{{ siteConfig('email') }}</a> 
				</li>

                <li>
                  <div class="media">
                    <a class="iconbox   mr-3  mt-3" href="#" target="_blank"><i class="fa fa-map-marker   "
                        aria-hidden="true" style=" color: #ffffff;font-size: 16px; "></i></a>
                    <div class="media-body">
                      <a href="#" style="line-height: normal;">{{ siteConfig('address') }}</a>
                    </div>
                  </div>
                </li>


              </ul>
            </div>
          </div>

        </div>
      </div>