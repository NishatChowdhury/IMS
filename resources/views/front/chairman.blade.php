<section class="pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>
                    {{ $chairman->title ?? 'Chairman Message' }}
                </h2>
                @if($chairman)
                    {!! Str::limit($chairman->body,800) !!}
                @endif
                <a style="color: blue" class="btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">...more</a>
            </div>
            <div class="col-md-6 mt-3">
                <img src="{{ asset('uploads/message') }}/{{ $chairman->image ?? 'untitled.png' }}" alt="">
            </div>
        </div>
    </div>
</section>

{{--read more--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
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
                                <img style="margin-top: 10px"  height="200px"  width="200px" src="{{asset('uploads/message/') }}/{{ $chairman->image ?? '' }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <h2>
                                    {{ $chairman->title ?? 'Chairman Message'}}
                                </h2>
                                @if($chairman)
                                    <span aria-hidden="true">{!! $chairman->body !!}</span>
                                @endif
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
