<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col"><b>{{ __('Examination') }}</b></th>
        <th scope="col"><b>{{ __('Start Date') }}</b></th>
        <th scope="col"><b>{{ __('End Date') }}</b></th>
        <th scope="col"><b>{{ __('Full Marks') }}</b></th>
        <th scope="col"><b>{{ __('GPA') }}</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($exams as $exam)
        <tr data-toggle="modal" data-id="{{$exam->id ?? 0}}" data-target="#exampleModal" data-name="{{ $exam->name }}" class="result-details example">
            <td>{{$exam->name}}</td>
            <td>{{$exam->start}} </td>
            <td>{{$exam->end}} </td>
            <td>{{$exam->total_mark}}</td>
            <td>{{$exam->gpa}}</td>
        </tr>
    @endforeach

    </tbody>
</table>