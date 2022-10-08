@extends('layouts.front-inner')

@section('title','Alumni Login')

@section('content')

    <section class="padding-y-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card shadow-v2">
                        <div class="card-header border-bottom">
                            <h4 class="mt-4">
                                {{ __(' Log In to Your Alumni Account!')}}
                            </h4>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <form action="{{ route('alumni.show') }}" method="POST" class="px-lg-4">
                                @csrf
                                <div class="input-group input-group--focus mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white ti-id-badge"></span>
                                    </div>
                                    <input type="text" name="applicationID" class="form-control border-left-0 pl-0" placeholder="Application ID">
                                </div>
                                <div class="input-group input-group--focus mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white ti-mobile"></span>
                                    </div>
                                    <input type="text" name="mobile" class="form-control border-left-0 pl-0" placeholder="Application ID">
                                </div>

                                <button class="btn btn-block btn-primary">{{ __('Log In') }}</button>
                                <p class="my-5 text-center">
                                    {{--                                    Don’t have an account? <a href="page-signup.html" class="text-primary">Register</a>--}}
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
@stop

@push('js')
    <script>
        function myPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var element = document.getElementById("togglePassword");
            element.classList.toggle("fa-eye-slash");
        }
    </script>
@endpush