<div class="table-responsive my-4">
    {{ Form::selectMonth('month',$present_month,['class'=>'btn btn-outline-secondary mb-2 attn-search','id'=>'attendance-month']) }}
    {{ Form::selectRange('year',now()->subYear()->format('Y'),now()->addYear()->format('Y'),$present_year,['class'=>'btn btn-outline-secondary mb-2 attn-search','id'=>'attendance-year']) }}
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">{{ __('Date') }}</th>
            <th scope="col">{{ __('In Time') }}</th>
            <th scope="col">{{ __('Out Time') }}</th>
            <th scope="col">{{ __('Status') }}</th>
        </tr>
        </thead>
        <tbody id="attendance_search">
        @foreach($attendances as $day)
            <tr>
                <th scope="row" class="text-dark font-weight-semiBold">{{ $day->date->format('Y-m-d') }}</th>
                <td>{{$day->in_time}} </td>
                <td>{{$day->out_time}} </td>
                <td>
                    <a href="#" class="btn btn-link">{{ $day->status->name ?? 'undefined' }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>