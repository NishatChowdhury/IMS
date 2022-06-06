<div class="mb-3">
    <div class="text-center">
        <div class="row">
            <div class="col-5">
                @if($diaries->count() > 0)
                    <input type="date" id="date" class="form-control form-control-sm" value="{{ $diaries->first()->date->format('Y-m-d') ?? now()->format('Y-m-d') }}">
                @else
                    <input type="date" id="date" class="form-control form-control-sm" value="{{ now()->format('Y-m-d') }}">
                @endif
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-sm btn-primary" id="diary-search"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">{{ __('Subject') }}</th>
            <th scope="col">{{ __('Teacher') }}</th>
            <th scope="col">{{ __('Description') }}</th>
        </tr>
        </thead>
        <tbody id="diaryBody">
        @foreach($diaries as $diary)
            <tr>
                <td>{{ $diary->subject->name }}</td>
                <td>{{ $diary->teacher->name }}</td>
                <td>{!!  $diary->description  !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
