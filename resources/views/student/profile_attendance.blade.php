<div class="table-responsive my-4">
    {{ Form::selectMonth('month',$present_month,['class'=>'btn btn-outline-secondary mb-2 attn-search','id'=>'attendance-month']) }}
    {{ Form::selectRange('year',now()->subYear()->format('Y'),now()->addYear()->format('Y'),$present_year,['class'=>'btn btn-outline-secondary mb-2 attn-search','id'=>'attendance-year']) }}
    <div id="attendance_search">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th scope="col">{{ __('Date') }}</th>
                <th scope="col">{{ __('In Time') }}</th>
                <th scope="col">{{ __('Out Time') }}</th>
                <th scope="col">{{ __('Status') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $day)
                <tr>
                    <th scope="row" class="text-dark font-weight-semiBold">{{ $day->date->format('Y-m-d') }}</th>
                    <td>{{ $day->in_time ?? '-'}}</td>
                    <td>{{ $day->out_time ?? '-'}}</td>
                    <td>
                        <a href="#" class="btn btn-link">{{ $day->status->name ?? 'undefined' }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-secondary">
                <tbody>
                <tr>
                    <td>Present: {{ $attendances->where('attendance_status_id',1)->count() }}</td>
                    <td>Absent: {{ $attendances->where('attendance_status_id',2)->count() }}</td>
                    <td>Delay: {{ $attendances->where('attendance_status_id',3)->count() }}</td>
                    <td>Early Leave: {{ $attendances->where('attendance_status_id',4)->count() }}</td>
                </tr>
                <tr>
                    <td>Holiday: {{ $attendances->where('attendance_status_id',5)->count() }}</td>
                    <td>Weekly Off: {{ $attendances->where('attendance_status_id',6)->count() }}</td>
                    <td>Leave: {{ $attendances->where('attendance_status_id',7)->count() }}</td>
                    <td>Late & Early Leave: {{ $attendances->where('attendance_status_id',8)->count() }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>