<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif

    @php
        $total_price=0;
    @endphp

    @foreach($carts as $cart)
        <br>
        <img src="{{url('storage/' . $cart->product->image)}}" alt="" height="100px">
        <p>Name : {{$cart->product->name}}</p>
        <p>Amount : {{$cart->amount}}</p>
    <form action="{{route('update_cart', $cart)}}" method="post">
        @method('patch')
        @csrf
        <input type="number" name="amount" value="{{$cart->amount}}">
        <button type="submit">Update Amount</button>
    </form>
    <br>
    <form action="{{route('delete_cart', $cart)}}" method="post">
        @method('delete')
        @csrf
        <button type="submit">Delete</button>
    </form>
    @php
        $total_price += $cart->product->price * $cart->amount;
    @endphp
    @endforeach
    <p>Rp{{$total_price}}</p>
    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <button type="submit" @if ($carts->isEmpty()) disabled @endif>Checkout</button>
    </form>
</body>
</html>