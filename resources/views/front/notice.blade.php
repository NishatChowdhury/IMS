<section class="padding-y-100 bg-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row align-items-center">
                    <div class="col-md-12 mt-4">
                        <h2>{{ $about->title ?? __('Undefined') }}</h2>
                        @if($about)
                            {!! strip_tags(Str::limit($about->body,800)) !!}
                            <a style="color: blue" data-toggle="modal" data-target="#aboutModal" data-whatever="@mdo">{{ __('...more') }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-md-0">
                <div class="card shadow-v2 z-index-5" data-offset-top-xl="-160">
                    <div class="card-header text-white border-bottom-0" style="background-color: #97a1aa">
                        <span class="lead font-semiBold text-uppercase">
                          {{ __('Notice Board')}}
                         </span>
                    </div>

                    @foreach($notices as $notice)
                        <div class="p-4 border-bottom wow fadeInUp">
                            <p class="text-warning mb-1">
                                @if($notice->start)
                                    {{ $notice->start->format('Y-m-d') ?? '' }}
                                @else
                                    {{ $notice->created_at->format('Y-m-d') ?? '' }}
                                @endif
                            </p>
                            <a href="{{ action('Front\FrontController@noticeDetails',$notice->id) }}" class="text-info">
                                {{ strip_tags($notice->title) }}
                            </a>
                        </div>
                    @endforeach

                    <div class="p-4">
                        <a href="{{ action('Front\FrontController@notice') }}" class="btn btn-link pl-0">
                            {{ __('View All Notices')}}
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->
    </div> <!-- End Container -->
</section>

<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>{{ __('About Institute') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    @if($about)
                        <span aria-hidden="true">{!! $about->body !!}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
