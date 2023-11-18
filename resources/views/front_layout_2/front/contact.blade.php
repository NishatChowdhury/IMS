 <div class="contact-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">

          <!--Google Map Area Start -->
          <div class="google-map-area">
            <!--  Map Section -->
            <div id="contacts" class="map-area">
              <div id="googleMap" style="width: 100%; height: 451px;">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.6817019535715!2d91.84021977403405!3d22.3656443405262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad2764bdcab021%3A0xb35dd5e1bc2f9e65!2sWeb%20Point%20Ltd!5e0!3m2!1sen!2sbd!4v1683358842491!5m2!1sen!2sbd"
                  width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
          <!--End of Google Map Area-->
        </div>
        <div class="col-lg-6">
          <div class="contact-form">
            <div class="single-title">
              <h3>Send A Message</h3>
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
                  <i class="fa fa-send"></i>Submit
                </button>
              </form>
              <p class="form-messege"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>