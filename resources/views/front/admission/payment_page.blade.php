@extends('layouts.front-inner')

@section('title','Online Admission Form Fill-up Fee')


@section('content')

    <div class="container">
        <div class="mb-5 text-center">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-success mb-5">{{ __('Your admission form fill up payment section')}}</h3>
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">
                                    <tr>
                                        <td><b>Student Name</b></td>
                                        <td><b>:</b></td>
                                        <td>{{$getData->name ?? 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Class Name</b></td>
                                        <td><b>:</b></td>
                                        <td>{{$getData->classes->name ?? 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Group Name</b></td>
                                        <td><b>:</b></td>
                                        <td>{{$getData->group->name ?? 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Session</b></td>
                                        <td><b>:</b></td>
                                        <td>{{$getData->sessions->year ?? 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Admission Fee</b></td>
                                        <td><b>:</b></td>
                                        <td>{{$getData->onlineAdmission->fee != 'null' ? $getData->onlineAdmission->fee . ' TK' : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-dark btn-block" id="sslczPayBtn"
                                                    token="if you have any token validation"
                                                    postdata="your javascript arrays or objects which requires in backend"
                                                    order="If you already have the transaction generated for current order"
                                                    endpoint="{{ route('student.pay-via-ajax') }}"> {{ __('Pay Now') }} ({{$getData->onlineAdmission->fee}}) TK
                                            </button>
{{--                                            <button class="btn btn-dark btn-block">Pay Now )</button>--}}
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var obj = {};

        obj.amount = parseFloat("{{ $getData->onlineAdmission->fee }}");
        obj.info = parseFloat("{{ $getData->id }}");
        obj.payMethods = 'Online_admission';
        console.log('after-', obj);


        $('#sslczPayBtn').prop('postdata', obj);
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
@endsection