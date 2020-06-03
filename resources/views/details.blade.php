@extends('layouts.app')

@section('title', $customer->first_name . "'s Order History")

@section('content')
    <table>
        <thead>
            <tr>
                <th  align="justify">Date</th>
                <th  align="justify"># of Products</th>
                <th  align="justify">Total</th>
            </tr>
        </thead>
        <tbody>
            {{-- Details go here --}}
            @foreach ($customer->order_history as $order)
                    @if (isset($order->id))
                    <tr>
                        <td  align="justify">{{ date('d-M-y', strtotime($order->date_created)) }}</td>
                        <td  align="justify">{{ $order->items_total }}</td>
                        <td  align="justify">${{ $order->subtotal_inc_tax }}</td>
                    </tr>
                    @endif
                @endforeach
            <tr>
                <td colspan="2">Lifetime Value</td>
                <td style="font-weight: bold;">${{ $lifeTimeValue }}</td>
            </tr>
        </tbody>
    </table>
@endsection
