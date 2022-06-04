<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col"><b>{{ __('Subject') }}</b></th>
            <th scope="col"><b>{{ __('Full Mark') }}</b></th>
            <th scope="col"><b>{{ __('Objective') }}</b></th>
            <th scope="col"><b>Written</b></th>
            <th scope="col"><b>Practical</b></th>
            <th scope="col"><b>Total Mark</b></th>
            <th scope="col"><b>GPA</b></th>
            <th scope="col"><b>Grade</b></th>
        </tr>
        </thead>
        <tbody id="resultBody">
        @foreach($marks as $mark)
            <tr>
                <td>{{ $mark->subject->name }}</td>
                <td>{{ $mark->full_mark }}</td>
                <td>{{ $mark->objective }}</td>
                <td>{{ $mark->written }}</td>
                <td>{{ $mark->practical }}</td>
                <td>{{ $mark->total_mark }}</td>
                <td>{{ $mark->gpa }}</td>
                <td>{{ $mark->grade }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
