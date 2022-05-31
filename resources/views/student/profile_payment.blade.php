<div class="row">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col"><b>{{ __('Date') }}</b></th>
            <th scope="col"><b>Amount</b></th>
            <th scope="col"><b>Discount</b></th>
            <th scope="col"><b>Method</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{$payment->date}}</td>
                <td>{{$payment->amount}}</td>
                <td>{{$payment->discount}}</td>
                <td>{{$payment->payment_method}}</td>
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

</div> <!-- END row-->