<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{$product->name}}</title>
</head>
<body>
    <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data">   
        @method('patch')
        @csrf
        <label>Name</label><br>
        <input type="text" name="name" placeholder = "Name" value="{{$product->name}}"><br>
        <label>Description</label><br>
        <input type="text" name="description" placeholder = "Description" value="{{$product->description}}"><br>
        <label for="">Price</label><br>
        <input type="number" name="price" placeholder = "Price" value="{{$product->price}}"><br>
        <label for="">Stock</label><br>
        <input type="number" name="stock" placeholder = "Stock" value="{{$product->stock}}"><br>
        <label for="">Image</label><br>
        <input type="file" name="image" placeholder = "Image"><br>
        <button type="submit">Update Data</button>
    </form>
</body>
</html>