<div class="activity-area">
    <div class="container">
        <div class="row">
            @foreach($features as $feature)
                <div class="col-lg-4 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon">
                            <a href="{{ url('/page') }}/{{$feature->menu->uri ?? '#'}}">
                                <img class="rounded-circle" alt="" src="{{ asset('assets/img/features/') }}/{{ $feature->image }}" height='80' />
                            </a>
                        </div>
                        <h4>{{ $feature->name }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
