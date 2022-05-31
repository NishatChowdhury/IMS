<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">{{ __('Date') }}</th>
            <th scope="col">{{ __('Subject') }}</th>
            <th scope="col">{{ __('Teacher') }}</th>
            <th scope="col">{{ __('Description') }}</th>
        </tr>
        </thead>
        <tbody id="diaryBody">@foreach($diaries as $diary)
            <tr>
                <td>{{ $diary->date }}</td>
                <td>{{ $diary->subject->name }}</td>
                <td>{{ $diary->teacher->name }}</td>
                <td>{!!  $diary->description  !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
