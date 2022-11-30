<section class=" padding-y-100 bg-black-0_9">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mr-auto my-4 text-white wow slideInUp">
                <h2>{{ __('Subscribe to') }} <span class="text-primary">{{ __('Newsletter')}}</span></h2>
                <p class="lead">
                    {{ __('Get notified about new courses, events, community & more')}}
                </p>
            </div>
            <div class="col-md-6 my-4 wow zoomIn">
                <form method="post" action="{{route('store.subscriber')}}">
                    @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text ti-email bg-white"></div>
                    </div>
                    <input type="text" name="email" placeholder="Enter your email" class="form-control py-3 pl-0 border-white" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">{{ __('Subscribe')}}</button>
                    </div>
                </div>
                </form>
            </div>
        </div> <!-- END row-->
    </div>
</section>
