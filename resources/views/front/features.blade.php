<section class="bg-light-v2 paddingTop-80 paddingBottom-100">
    <div class="container">
        <div class="row text-center">
            @foreach($features as $feature)
            <div class="col-md-6 col-lg-4 marginTop-30">
                <a href="{{ url($feature->menu->uri) }}" class="card shadow-v1 align-items-center p-5 hover:transformTop">
                    <img src="{{ asset('assets/img/features/') }}/{{ $feature->image }}" alt="{{ $feature->name }}" height="80">
                    <h4 class="mt-2">
                        {{ $feature->name }}
                    </h4>
                </a>
            </div>
            @endforeach()
{{--            <div class="col-md-6 col-lg-4 marginTop-30">--}}
{{--                <a href="{{ action('FrontController@internal_exam') }}" class="card shadow-v1 align-items-center p-5 hover:transformTop">--}}
{{--                    <img src="assets/img/svg/3.png" alt="">--}}
{{--                    <h4 class="mt-2">--}}
{{--                       Results--}}
{{--                    </h4>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-4 marginTop-30">--}}
{{--                <a href="#" class="card shadow-v1 align-items-center p-5 hover:transformTop">--}}
{{--                    <img src="assets/img/svg/2.png" alt="">--}}
{{--                    <h4 class="mt-2">--}}
{{--                       Sea Scout--}}
{{--                    </h4>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-4 marginTop-30">--}}
{{--                <a href="{{ action('FrontController@validateAdmission') }}" class="card shadow-v1 align-items-center p-5 hover:transformTop">--}}
{{--                    <img src="assets/img/svg/1.png" alt="">--}}
{{--                    <h4 class="mt-2">--}}
{{--                       Academic Calendar--}}
{{--                    </h4>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-4 marginTop-30">--}}
{{--                <a href="{{ action('FrontController@syllabus') }}" class="card shadow-v1 align-items-center p-5 hover:transformTop">--}}
{{--                    <img src="assets/img/svg/4.png" alt="">--}}
{{--                    <h4 class="mt-2">--}}
{{--                        Syllabus--}}
{{--                    </h4>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-4 marginTop-30">--}}
{{--                <a href="{{ action('FrontController@class_routine') }}" class="card shadow-v1 align-items-center p-5 hover:transformTop">--}}
{{--                    <img src="assets/img/svg/5.png" alt="">--}}
{{--                    <h4 class="mt-2">--}}
{{--                        Routine--}}
{{--                    </h4>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-4 marginTop-30">--}}
{{--                <a href="{{ action('FrontController@playlists') }}" class="card shadow-v1 align-items-center p-5 hover:transformTop">--}}
{{--                    <img src="assets/img/svg/6.png" alt="">--}}
{{--                    <h4 class="mt-2">--}}
{{--                        Video Gallery--}}
{{--                    </h4>--}}
{{--                </a>--}}
{{--            </div>--}}
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>   <!-- END section-->
