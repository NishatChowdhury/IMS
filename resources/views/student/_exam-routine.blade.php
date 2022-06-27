@foreach($routines as $key => $exams)
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="bg-dark">
            <th colspan="5" class="text-center">{{ $exams->first()->exam->name }}</th>
        </tr>
        <tr class="table-active">
            <th scope="col">{{ __('Subject') }}</th>
            <th scope="col">{{ __('Date') }}</th>
            <th scope="col">{{ __('Start') }}</th>
            <th scope="col">{{ __('End') }}</th>
            <th scope="col">{{ __('Teacher') }}</th>
        </tr>
        </thead>
        <tbody id="">
        @foreach($exams as $data)
            <tr>
                <td>{{ $data->subject->name ?? '' }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->start }}</td>
                <td>{{ $data->end }}</td>
                <td>{{ $data->teacher->name ?? '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endforeach