@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product->name}}</title>
</head>
<body>
<div class="container mt-7 mx-auto md:px-12">
    <!-- awal header bg abu-abu -->
    <div class="mt-12 text-2xl text-gray-500 font-semibold whitespace-nowrap p-2">
    {{$product->name}} - oleh {{$product->writer}}
    </div>
    <hr>
    <!--akhir header bg abu-abu -->

    <div class="px-2 pt-2 pb-7">
    <a href="{{route('index_product')}}" class="text-blue-700 hover:text-gray-500"> Toko Buku</a> <span class="text-gray-500">> Tambah Keranjang</span>
    </div>
        <div class="grid grid-cols-1 place-items-center">
            <div class="grid grid-cols-2 gap-4 border rounded-lg h-auto w-3/6">
                <div>
                    <img src="{{url('storage/' . $product->image)}}" alt="" class="h-auto w-auto px-3 pt-3">
                </div>

                <div class="py-3 pr-3">
                    <p class="text-xl font-semibold py-2">Stok : {{$product->stock}}</p>
                    <form action="{{route('add_to_cart', $product)}}" method="post">
                        @csrf
                        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="amount" value=1>
                        <div class="pt-2">
                        <button type="submit" class="bg-blue-700 px-4 py-2 rounded text-white hover:bg-blue-500">Tambah ke Keranjang</button>
                        </div>
                    </form>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="text-red-700">{{$error}}</p>
                        @endforeach
                    @endif 
                </div>

                <div class="col-span-2 px-3 pb-3">
                    <h1 class="text-xl font-semibold pb-3">Rp : {{$product->price}}</h1>
                    <p>Sinopsis :</p>
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div> 
</body>
</html>
@endsection