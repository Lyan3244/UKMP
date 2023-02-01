<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product->name}}</title>
</head>
<body>
    <a href="{{route('index_product')}}">Back</a>
    <p>Name : {{$product->name}}</p>
    <p>Description : {{$product->description}}</p>
    <p>Rp : {{$product->price}}</p>
    <p>Stock : {{$product->stock}}</p>
    <img src="{{url('storage/' . $product->image)}}" alt="" height = "100px">
    <br>
    <form action="{{route('add_to_cart', $product)}}" method="post">
        @csrf
        <input type="number" name="amount" value=1>
        <button type="submit">Add to Cart</button>
    </form>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif  
</body>
</html>