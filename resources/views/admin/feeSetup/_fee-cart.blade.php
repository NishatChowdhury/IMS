@foreach($fees as $key => $fee)
{{--    {{dd($fee)}}--}}
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ \App\FeeCategory::query()->find($fee['category_id'])->name }}</td>
        <td class="text-right">{{ number_format($fee['amount'],2) }}</td>
        <td class="text-center"><button type="button" onclick="removeFeeFromCart({{ $key }})"><span class="fas fa-trash-alt"></span></button></td>
    </tr>
@endforeach
<tr>
    <th></th>
    <th>{{ __('Total') }}</th>
    @php $amount = array_column($fees,'amount') @endphp
    <th class="text-right">{{ number_format(array_sum($amount),2) }}</th>
    <th></th>
</tr>
