 <div class="contact-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">

          <!--Google Map Area Start -->
          <div class="google-map-area">
            <!--  Map Section -->
            <div id="contacts" class="map-area">
              <div id="googleMap" style="width: 100%; height: 451px;">
                {!! siteConfig('map') !!}
              </div>
            </div>
          </div>
          <!--End of Google Map Area-->
        </div>
        <div class="col-lg-6">
          <div class="contact-form">
            <div class="single-title">
              <h3>{{ __('Send A Message') }}</h3>
            </div>
            <div class="contact-form-container">
              <form id="contact-form" action="{{ action('Front\MessagesController@store') }}" method="post" f>
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" name="name" placeholder="Your Name *" />
                  </div>
                  <div class="col-md-6">
                    <input type="email" name="email" placeholder="Your Email *" />
                  </div>
                </div>
                <input type="text" name="phone" placeholder="Subject *" />
                <textarea name="message" class="yourmessage" placeholder="Your message"></textarea>
                <button type="submit" class="button-default button-yellow submit">
                  <i class="fa fa-send"></i>{{ __('Submit') }}
                </button>
              </form>
              <p class="form-messege"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>