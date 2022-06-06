@foreach ($attendances as $data)
    <tr>
        <th scope="row" class="text-dark font-weight-semiBold">{{ $data->date->format('Y-m-d') }}</th>
        <td>{{ $data->in_time }}</td>
        <td>{{ $data->out_time }}</td>
        <td><a href="#" class="btn btn-link">{{ $data->status->name ?? "Undefined" }}</a></td>
    </tr>
@endforeach