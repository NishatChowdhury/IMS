<section class="" data-primary-overlay="7" style="background-color: #38c773">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="navbar-brand ml-5">
                    {{--<a class="logo-default" href="index.html"><img alt="" src="assets/img/logo-black.png"></a>--}}
                    <a class="logo-default" href="{{ url('/') }}"><img alt="" src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" width="75" height="75"></a>
                </div>
            </div>
            <div class="col-10 text-white">
                <h2 class="mb-4">
                    {{ siteConfig('name') }}<br>
                    {{ siteConfig('bn') }}
                </h2>
                {{--<div class="width-3rem height-4 rounded bg-white mx-auto"></div>--}}
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>