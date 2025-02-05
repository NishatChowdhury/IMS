<section class="paddingTop-60 paddingBottom-100" data-dark-overlay="6" style="background-color: rgb(151, 161, 170);">
    <div class="container">
        <div class="row text-center text-white">

            <div class="col-lg-3 col-md-6 mt-5 wow zoomIn" data-wow-delay=".1">
                <!-- <h2 class="h1 text-primary"> -->
                <h2 class="h1 text-primary ">
                    {{ \App\Models\Backend\Student::all()->count() }}
                </h2>
                <p class="lead">
                    {{ __('Students')}}
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 wow zoomIn" data-wow-delay=".2">
                <h2 class="h1 text-primary">
               
                    {{ \App\Models\Backend\AcademicClass::all()->count() }}
                </h2>
                <p class="lead">
                    {{ __('Classes')}}
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 wow zoomIn" data-wow-delay=".3">
                <h2 class="h1 text-primary">
              
                    {{ __('235K')}}
                </h2>
                <p class="lead">
                    {{ __('Attendance')}}
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 wow zoomIn" data-wow-delay=".4">
                <h2 class="h1 text-primary">
            
                    {{ \App\Models\Backend\Staff::all()->count() }}
                </h2>
                <p class="lead">
                    {{ __('Teachers & Staff') }}
                </p>
            </div>

        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
