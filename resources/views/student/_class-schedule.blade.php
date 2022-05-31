@foreach($schedules as $key => $day)
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th colspan="4" class="text-center">{{ $key }}</th>
        </tr>
        <tr>
            <th scope="col">Subject</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col">Teacher</th>
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