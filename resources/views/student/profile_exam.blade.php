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

    @foreach($exam as $data)
        <tr data-toggle="modal" data-id="{{$data->exam->id ?? 0}}"
            data-target="#exampleModal" data-name="{{ $data->exam->name }}" class="result-details example">
            <td>{{$data->exam->name}}</td>
            <td>{{$data->exam->start}} </td>
            <td>{{$data->exam->end}} </td>
            <td>{{$data->total_mark}}</td>
            <td>{{$data->gpa}}</td>
        </tr>
    @endforeach

    </tbody>
</table>