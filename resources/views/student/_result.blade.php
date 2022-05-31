<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col"><b>Subject</b></th>
            <th scope="col"><b>Full Mark</b></th>
            <th scope="col"><b>Objective</b></th>
            <th scope="col"><b>Written</b></th>
            <th scope="col"><b>Practical</b></th>
            <th scope="col"><b>Total Mark</b></th>
            <th scope="col"><b>GPA</b></th>
            <th scope="col"><b>Grade</b></th>
        </tr>
        </thead>
        <tbody id="resultBody">
        @foreach($resultDetails as $result)
            <tr>
                <td>{{ $result->subject->name }}</td>
                <td>{{ $result->full_mark }}</td>
                <td>{{ $result->objective }}</td>
                <td>{{ $result->written }}</td>
                <td>{{ $result->practical }}</td>
                <td>{{ $result->total_mark }}</td>
                <td>{{ $result->gpa }}</td>
                <td>{{ $result->grade }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
