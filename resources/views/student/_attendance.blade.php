
<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th scope="col">{{ __('Date') }}</th>
        <th scope="col">{{ __('In Time') }}</th>
        <th scope="col">{{ __('Out Time') }}</th>
        <th scope="col">{{ __('Status') }}</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $present = 0;
    $absent = 0;
    $late = 0;
    $EL = 0;
    $le= 0;
    $LRE = 0;
    ?>
    @foreach($attendances as $day)
        <tr>
            <th scope="row" class="text-dark font-weight-semiBold">{{ $day->date->format('Y-m-d') }}</th>
            <td>{{ $day->in_time ?? '-'}}</td>
            <td>{{ $day->out_time ?? '-'}}</td>
            <td>
                <a href="#" class="btn btn-link">{{ $day->status->name ?? 'undefined' }}</a>
            </td>
        </tr>
        @if($day->status->code=='P')
            <?php $present++; ?>
        @elseif($day->status->code=='A')
            <?php $absent++; ?>
        @elseif($day->status->code=='L')
            <?php  $late++; ?>
        @elseif($day->status->code=='E')
            <?php  $EL++; ?>
        @elseif($day->status->code=='Le')
            <?php  $le++; ?>
        @elseif($day->status->code=='LRE')
            <?php  $LRE++; ?>
        @endif

    @endforeach
    </tbody>
</table>
<table class="table table-bordered font-weight-bold">
    <thead>
    <tr>
        <th colspan="7" class="text-center bg-secondary font-weight-bold text-white">Student summery</th>
    </tr>
    <tr>
        <th scope="col">{{ __('Total present') }}</th>
        <th scope="col">{{ __('Total Absent') }}</th>
        <th scope="col">{{ __('Total Late') }}</th>
        <th scope="col">{{ __('Early Leave') }}</th>
        <th scope="col">{{ __('Leave') }}</th>
        <th scope="col">{{ __('Late & Leave Leave') }}</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $present; ?> </td>
        <td><?php echo $absent; ?> </td>
        <td><?php echo $late; ?> </td>
        <td><?php echo $EL; ?> </td>
        <td><?php echo $le; ?> </td>
        <td><?php echo $LRE; ?> </td>
    </tr>
    </tbody>
</table>