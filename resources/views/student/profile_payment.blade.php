<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th class="text-center" scope="col"><b>{{ __('Date') }}</b></th>
        <th class="text-right" scope="col"><b>{{ __('Amount') }}</b></th>
        <th class="text-right" scope="col"><b>{{ __('Discount') }}</b></th>
        <th class="text-center" scope="col"><b>{{ __('Method') }}</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
            <td class="text-center">{{ $payment->date->format('Y-m-d') }}</td>
            <td class="text-right">{{ number_format($payment->amount,2) }}</td>
            <td class="text-right">{{ number_format($payment->discount,2) }}</td>
            <td class="text-center">{{ $payment->method->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<table class="table table-bordered">
    <tr>
        <td>{{ __('Total Due') }}</td>
        <td>{{ number_format($due,2) }}</td>
        <td>
            <button class="btn btn-info mr-2">Pay With Bkash</button>
            <button class="btn btn-danger">Pay With Nagad</button>
        </td>
    </tr>
</table>

