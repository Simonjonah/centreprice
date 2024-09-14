@if(session('cart'))
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        @php
            $total = 0;
        @endphp
        <tbody>
            @foreach(session('cart') as $id => $details)
                @php
                    $total +=$details['quantity'] * $details['amount']
                @endphp
                <tr>
                    <td>{{ $details['productname'] }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>{{ $details['amount'] }}</td>
                    <td>{{ $details['quantity'] * $details['amount'] }}</td>
                    <td>
                        <a href="{{ route('web.remove', $id) }}">Remove</a>
                    </td>
                </tr>
            @endforeach
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $total }}</td>
        </tbody>
    </table>
@else

    <p>Your cart is empty</p>
@endif
