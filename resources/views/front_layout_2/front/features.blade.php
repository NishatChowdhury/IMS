 <div class="activity-area">
    <div class="container">
      <div class="row">
       	@foreach($features as $feature)
        <div class="col-lg-4 col-md-6 col-sm-6 activity">
          <div class="single-activity">
            <div class="single-activity-icon">

			  <a href="{{ url('/page') }}/{{$feature->menu->uri ?? '#'}}">
              <img class="rounded-circle" alt="" src="{{ asset('assets/img/features/') }}/{{ $feature->image }}" height='80' />

			  </a>
            </div>
            <h4> {{ $feature->name }}</h4>
            <!-- <p>
              It is a long established fact that a reader will be distracted
              by the readable content of a page looking at layout
            </p> -->
          </div>
        </div>
		@endforeach
        
       

       
        

        
      </div>
    </div>
  </div>
