  <div class="events-block">
    <div class="events-nav">
      <div class="container">
        <div class="title">
          <h2 class="text-dark">Upcoming Events</h2><span></span>
        </div>

      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <!-- --- -->
		
		 @foreach($events as $event)
        <div class="col  event-col">
          <div class="card ">
            <img class="card-img-top" src="{{ asset('storage/uploads/events/') }}/{{ $event->image }}" alt="">
            <div class="card-body">
              <h4 class="h5">
                {{ $event->title }}
              </h4>
              <ul class="list-unstyled my-4 line-height-xl " style="font-size: 14px;">
                <li>
                  <i class="fa fa-clock-o mr-2 " style="color: blue;"></i>
                 {{ $event->date->format('F d, Y') }} @ {{ $event->time }}
                </li>
                <li>
                  <i class="fa fa-map-marker mr-2 " style=" color: blue; font-size: 17px; padding-left: 1px;"></i>
                  {{ $event->venue }}
                </li>
              </ul>
              <a href="{{ action('Front\FrontController@event',$event->id) }}" class="text-primary">
                View Details
                <i class="fa fa-angle-double-right small"></i>
              </a>
            </div>
          </div>
        </div>
		@endforeach
        <!--  -->

        
        <!-- --- -->
      </div>
    </div>
  </div>