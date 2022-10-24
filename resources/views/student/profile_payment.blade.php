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
            <td class="text-center">{{ $payment->method->name ?? '' }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="2">
            <b>Total Due</b>
        </td>
        <td colspan="2" class="text-right">
            {{$due}} TK
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <b>Payable Amount</b>
        </td>
        <td colspan="2" class="text-right">
            <input type="number" class="form-control payableAmount" placeholder="Enter Payable Amount" value="{{ $due }}">
        </td>
    </tr>
    <tr>
        <td colspan="4" class="text-right">
           @if($due > 10)
            <button class="your-button-class" id="sslczPayBtn"
                    token="if you have any token validation"
                    postdata="your javascript arrays or objects which requires in backend"
                    order="If you already have the transaction generated for current order"
                    endpoint="{{ route('student.pay-via-ajax') }}"> {{ __('Pay Now') }}
            </button>
            @else
                <span class="bg-warning"> {{ __('Payment amount should be more than 10.00') }}</span>
            @endif
        </td>
    </tr>
    </tfoot>
</table>

@push('js')
    <script>
        let amountGet;
        var obj = {};
         $('#sslczPayBtn').on('click', function (event){
             amountGet = $('.payableAmount').val();
             obj.info = parseFloat("{{ auth()->user()->student_id }}");
             obj.payMethods = 'studentFee';
              obj.amount = amountGet;

        });
        console.log('behind-', amountGet);

        // obj.amount = 23;
        {{--obj.amount = parseFloat("{{ $due }}");--}}


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