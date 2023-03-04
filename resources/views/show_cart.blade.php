@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<div class="container mt-7 mx-auto md:px-12">
    <!-- awal header bg abu-abu -->
    <div class="mt-10 text-2xl text-gray-500 font-semibold whitespace-nowrap p-2">
        Keranjang
    </div>
    <hr>
    <div class="px-2 pt-2">
        <a href="/penulis.ukm.um/dashboard" class="text-blue-700 hover:text-gray-500"> Dashboard</a> <span class="text-gray-500">> Keranjang</span>
        <div>
            @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-red-700">{{$error}}</p>
            @endforeach
            @endif

            @php
                $total_price=0;
            @endphp
        </div>
    </div>
    <!--akhir header bg abu-abu -->
<div class="flex flex-row items-center justify-center">
    <!-- bagian header keranjang seperti judul, gambar-->
    <div class="flex-col">
    @foreach($carts as $cart)
    <br>
    <div class="border rounded-lg">
        <div>
            <img src="{{url('storage/' . $cart->product->image)}}" alt="" class="p-3 rounded h-44">
        </div>

        <div class="col-span-3 col-start-2 px-3 pb-3">
            <p class="text-gray-500">Judul buku : {{$cart->product->name}}</p>
            <p class="text-gray-500">Banyak buku yang dibeli : {{$cart->amount}}</p>
        </div>

        <div class="col-span-4 py-3 px-10 border-t">
            <div class="flex">
                <div>
                <form action="{{route('update_cart', $cart)}}" method="post">
                    @method('patch')
                    @csrf
                    <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="amount" value="{{$cart->amount}}">
                    <button type="submit" class="bg-blue-700 px-4 py-2 rounded text-white hover:bg-blue-500">Perbarui Jumlah</button>
                </form>
                </div>
                <div class="px-2">
                <form action="{{route('delete_cart', $cart)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="bg-blue-700 px-4 py-2 rounded text-white hover:bg-red-500">Hapus</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    @php
    $total_price += $cart->product->price * $cart->amount;
    @endphp
    @endforeach
    </div>
    <!--akhir dari header keranjang-->
    <!--bagian total harga yang dibeli-->
    <div class="border rounded-lg mx-10 p-5">
        <H1 class="font-semibold text-xl pb-2 text-gray-500">Ringkasan Belanja</H1>
        <p class="pb-2 text-gray-500">Total Harga Rp{{$total_price}}</p>
        <form action="{{ route('checkout') }}" method="post">
        @csrf
        <button type="submit" class="bg-blue-700 px-20 py-2 rounded text-white hover:bg-blue-500" @if ($carts->isEmpty()) disabled @endif>Checkout</button>
        </form>
    </div>
    <!--akhir bagian total harga yang dibeli-->
</div>
</body>
</html>
@endsection