@foreach($schedules as $key => $day)
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="table-active">
            <th colspan="4" class="text-center">{{ $key }}</th>
        </tr>
        <tr>
            <th scope="col">{{ __('Subject') }}</th>
            <th scope="col">{{ __('Start') }}</th>
            <th scope="col">{{ __('End') }}</th>
            <th scope="col">{{ __('Teacher')}}</th>
        </tr>
        </thead>
        <tbody id="scheduleBody">
        @foreach($day as $data)
            <tr>
                <td>{{ $data->subject->name }}</td>
                <td>{{ $data->start }}</td>
                <td>{{ $data->end }}</td>
                <td>{{ $data->teacher->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endforeach