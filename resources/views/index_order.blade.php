@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container mt-7 mx-auto md:px-12">
    <!-- awal header bg abu-abu -->
    <div class="mt-10 text-2xl text-gray-500 font-semibold whitespace-nowrap p-2">
        Daftar Pesanan
    </div>
    <hr>
    <div class="px-2 pt-2">
        <a href="/penulis.ukm.um/dashboard" class="text-blue-700 hover:text-gray-500"> Dashboard</a> <span class="text-gray-500">> Daftar Pesanan</span>
    </div>

    <div class="pt-5">
    @foreach ($orders as $order)
    <div class="mx-auto border rounded-md w-4/6">
        <div class="bg-gray-100 rounded-t">
            <div class="px-5 py-3">
            <p class="font-semibold text-lg">ID Pemesanan - {{$order->id}} oleh {{$order->user->name}}</p>
            <p>{{$order->created_at}}</p>
            </div>
        </div>

        <div class="px-14 py-3">
        <p class="py-1">Detail Pemesanan Buku :</p>
    @foreach($order->transactions as $transaction)
        <p class="py-1">Judul Buku yang dibeli : {{$transaction->product->name}}</p>
        <p class="py-1">Banyak Buku yang dibeli : {{$transaction->amount}} pcs</p>
        @php
            $total_price = $transaction->product->price * $transaction->amount;
        @endphp
        <p class="py-1">Total Pembayaran  : Rp{{$total_price}}</p>
        <hr>
    @endforeach
        <p class="py-1 font-semibold"> Status Pembayaran :
            @if($order->is_paid == true)
            <span class="text-blue-700 font-semibold">Sudah Terbayar</span>    
            @else 
            <span class="text-red-500 font-semibold">Belum Terbayar</span>
                @if($order->payment_receipt)
                    <a href="{{url('storage/' . $order->payment_receipt)}}" class="text-blue-700 hover:text-blue-500">Lihat Bukti Pembayaran</a>
                    <form action="{{route('confirm_payment', $order)}}" method="post">
                    @csrf
                    <div class="pb-10">
                    <button type="submit" class="bg-blue-700 px-4 py-2 rounded text-white hover:bg-blue-500 float-right">Konfirmasi</button>
                    </div>
                    </form>
                @endif
            @endif
        </p>
        </div>
    </div>
    <br>
    @endforeach
    </div>
</div>
</body>
</html>
@endsection