
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col"><b>Examination</b></th>
                <th scope="col"><b>Start Date</b></th>
                <th scope="col"><b>End Date</b></th>
                <th scope="col"><b>Full Mark's</b></th>
                <th scope="col"><b>GPA</b></th>
            </tr>
            </thead>
            <tbody>

                @foreach($exam as $data)
                    <tr data-toggle="modal" data-id="{{$data->exam->id}}" data-target="#exampleModal">
                        <td>{{$data->exam->name}}</td>
                        <td>{{$data->exam->start}} </td>
                        <td>{{$data->exam->end}} </td>
                        <td>{{$data->total_mark}}</td>
                        <td>{{$data->gpa}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>


