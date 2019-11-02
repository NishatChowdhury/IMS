<section class="pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>
                    <small class="text-primary d-block">
                        President
                    </small>
                    Message
                </h2>
                {!! substr($content->where('name','president message')->first()->content,0,1000) !!}
            </div>
            <div class="col-md-6 mt-3">
                {{--<img src="assets/img/avatar/1_1.png" alt="">--}}
                <img src="{{ asset('assets/img/pages/') }}/{{ $content->where('name','president message')->first()->image }}" alt="">
            </div>
        </div>
    </div>
</section>