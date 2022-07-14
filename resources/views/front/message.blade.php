@if($principal)
    <section class="pt-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('uploads/message') }}/{{ $principal->image }}" alt="">
                </div>
                <div class="col-md-6 mt-3">
                    <h2>
                        {{ $principal->title }}
                    </h2>
                    {!! Str::limit($principal->body,800) !!}
                    <a style="color: blue" data-toggle="modal" data-target="#principalModal" data-whatever="@mdo">{{ __('...more') }}</a>
                </div>
            </div>
        </div>
    </section>
    {{--read more--}}
    <div class="modal fade" id="principalModal" tabindex="-1" role="dialog" aria-labelledby="principalModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img style="margin-top: 10px"  height="200px"  width="200px" src="{{asset('uploads/message/'.$principal->image)}}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <h2>
                                        {{$principal->title}}
                                    </h2>
                                    <span aria-hidden="true">{!! $principal->body !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    {{--read more--}}
@endif