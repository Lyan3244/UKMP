<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Order</title>
</head>
<body>
    @php
        $total_price = 0;
    @endphp
    <p>Order ID {{$order->id}}</p>
    <p>By {{$order->user->name}}</p>

    @if($order->is_paid == true)
        <p>Paid</p>
    @else
        <p>unpaid</p>
    @endif
    <hr>
    @foreach($order->transactions as $transaction)
        <p>{{$transaction->product->name}} - {{$transaction->amount}} pcs</p>
        @php
            $total_price += $transaction->product->price * $transaction->amount;
        @endphp
    @endforeach
    <hr>
        <p>Total : Rp{{$total_price}}</p>
    <hr>

    @if($order->is_paid == false && $order->payment_receipt == null)
        <form action="{{route('submit_payment_receipt', $order)}}" method="post" enctype = "multipart/form-data">
            @csrf
            <label for="payment_receipt">Upload Your Payment Receipt</label><br>
            <input type="file" name="payment_receipt" id="payment_receipt"><br>
            <button type="submit">Submit Payment</button>
        </form>
    @endif
</body>
</html>