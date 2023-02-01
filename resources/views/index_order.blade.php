<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>
<body>
    @foreach ($orders as $order)
        <p>ID : {{$order->id}}</p>
        <p>User : {{$order->user->name}}</p>
        <p>{{$order->produk->name}}</p>
        <p>{{$order->created_at}}</p>
        <p>
            @if($order->is_paid == true)
                paid
            @else
                unpaid
                @if($order->payment_receipt)
                    <a href="{{url('storage/' . $order->payment_receipt)}}">show payment receipt</a>
                    <form action="{{route('confirm_payment', $order)}}" method="post">
                    @csrf
                    <button type="submit">Confirm</button>
                    </form>
                @endif
            @endif
        </p>
    @endforeach
</body>
</html>