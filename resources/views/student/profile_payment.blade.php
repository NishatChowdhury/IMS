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
            @if($due > 10)
            <button class="your-button-class" id="sslczPayBtn"
                    token="if you have any token validation"
                    postdata="your javascript arrays or objects which requires in backend"
                    order="If you already have the transaction generated for current order"
                    endpoint="{{ route('student.pay-via-ajax') }}"> {{ __('Pay Now') }}
            </button>
                <form action="{{ route('nagad.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="amount" value="{{ $due }}">
                    <label for="payment-btn">
                        <img src="{{ asset('dist/img/Nagad-Logo.wine.png') }}" alt="nagad" height="100">
                        <button type="submit" class="d-none" id="payment-btn"></button>
                    </label>
                </form>
            @else
                <span class="bg-warning"> {{ __('Payment amount should be more than 10.00') }}</span>
            @endif
        </td>
    </tr>
</table>

@push('js')
    <script>
        var obj = {};
        obj.amount = parseFloat("{{ $due }}");

        $('#sslczPayBtn').prop('postdata', obj);
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
@endpush