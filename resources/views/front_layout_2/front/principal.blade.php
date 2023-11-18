<section class="pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2">
                {{--<img src="assets/img/avatar/1_1.png" alt="">--}}
                {{--                <img src="{{ asset('assets/img/pages/') }}/{{ $content->where('name','principal message')->first()->image }}" alt="">--}}
            </div>
            <div class="col-md-6 mt-3">
                <h2>
                    <small class="text-primary d-block">
                        {{ __('Principal Message')}}
                    </small>

                </h2>
                @foreach($message as $msg)
                    @if($msg->alias=='principal')
                        {!! Str::limit($msg->body, 1000) !!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-4">
                <img src="{{ asset('uploads/message/'.$msg->image) }}" width="350px" height="350px" alt="">
            </div>
        </div>
    </div>
</section>
