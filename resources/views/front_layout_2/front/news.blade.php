<section class="bg-light padding-y-100 Campus-News">
    <div class="container p-4 ">
      <div class="row ">
        <div class="col-12 text-center mb-md-4">
          <h2 class="mb-4 mt-5">
            Campus News
          </h2>
          <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
        </div>
      </div> <!-- END row-->
      <div class="row">
        <div class="col-lg-6">
		@foreach($newses as $news)
          <div class="list-card align-items-center mt-5">
            <div class="col-md-4 px-md-0">
              <img class="w-100" src="{{ asset('storage/uploads/notice/') }}/{{ $news->file }}" alt="">
            </div>
            <div class="col-md-8 p-4">
              <p class="">{{ $news->start->format('F d, Y') }}</p>
              <a href="{{ action('Front\FrontController@newsDetails',$news) }}" class="h5">
                 {{ $news->title }}
              </a>
            </div>
          </div>
		  @endforeach
        
         
        </div>
        @if($latestNews)
        <div class="col-lg-6 mt-5 Campus">
          <div class="card">
            <img class="card-img-top" src="{{ asset('storage/uploads/notice') }}/{{ $latestNews->file }}" alt="">
            <div class="card-body">
              <p class="list-card">
                {{ $latestNews->start->format('F d, Y') }}
              </p>
              <h4>
                <a href="#">
                  {{ $latestNews->title }}
                </a>
              </h4>
              <p>
                {{ substr($latestNews->description,0,100) }}
              </p>
              <a href="{{ action('Front\FrontController@newsDetails',$latestNews) }}" class="btn   btn-outline-warning">
                Read More
              </a>
            </div>
          </div>
        </div>
		@endif
      </div> <!-- END row-->
    </div> <!-- END container-->
  </section>