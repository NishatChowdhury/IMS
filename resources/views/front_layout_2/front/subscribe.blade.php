 <section style="display: flex; justify-content: center; ">
    <div class="col-lg-6 col-md-6 col-sm-12 ">
      <div class="subscribe-container">
        <h3>Subscribe to Newsletter</h3>
        <p>
          Get notified about new courses, events, community & more
        </p>
        <form method="post" action="{{route('store.subscriber')}}">
          @csrf
          <div class="subscribe-form">
            <input type="email" name="email" placeholder="Your email here" required />
            <button type="submit"><i class="fa fa-send"></i></button>
          </div>
        </form>
      </div>
    </div>
  </section>