@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <table>
        <thead>
            <tr>
                <th align="justify">Name</th>
                <th align="justify"># of Orders</th>
            </tr>
        </thead>
            <tbody>
                {{-- Details go here --}}
                @foreach ($customerOrders as $customer)
                    @if (isset($customer['first_name']))
                    <tr>
                        <td align="justify"><a href="{{url('customers/'.$customer['id']) }}">{{ $customer['first_name'] }} {{ $customer['last_name'] }}</a></td>
                        <td align="center">{{ $customer['order_count'] }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
    </table>
@endsection
