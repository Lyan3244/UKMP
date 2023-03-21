@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Order</title>
</head>
<body>
<div class="container mt-7 mx-auto md:px-12">
    <!-- awal header bg abu-abu -->
    <div class="mt-10 text-2xl text-gray-500 font-semibold whitespace-nowrap p-2">
        Checkout
    </div>
    <hr>
    <div class="px-2 pt-2">
        <a href="/cart" class="text-blue-700 hover:text-gray-500"> Tambah Keranjang</a> <span class="text-gray-500">>  Checkout</span>
    </div>
    @php
        $total_price = 0;
    @endphp

    <div class="pt-5">
        <div class="mx-auto border rounded-md w-4/6 py-3 px-7">
            <p class="text-lg">Pesanan Oleh - {{$order->user->name}}</p>
            <p class="text-lg">Pengiriman ke {{$order->user->alamat}} <a href="/alamat" class="text-blue-700 pl-5 hover:text-blue-500">ubah</a></p>

            @if($order->is_paid == true)
                <p class="font-semibold text-blue-700 text-lg">Sudah Terbayar</p>
            @else
                <p class="font-semibold text-red-500 text-lg">Belum Terbayar</p>
            @endif
        </div>
    </div>

    <div class="pt-5">
        <div class="mx-auto border rounded-md w-4/6">
        <table class="border-separate border-spacing-x-28 border-spacing-y-3">
                <tr>
                    <th>Buku yang Dipesan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                </tr>
            @foreach($order->transactions as $transaction)
                <tr>
                    <td>{{$transaction->product->name}}</td>
                    <td>Rp{{$transaction->product->price}}</td>
                    <td>{{$transaction->amount}} pcs</td>
                </tr>
                @php
                $total_price += $transaction->product->price * $transaction->amount;
                @endphp
            @endforeach
                <tr>
                    <td class="font-semibold">Total Pesanan</td>
                    <td class="font-semibold text-lg text-blue-700">Rp{{$total_price}}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="pt-5">
        <div class="mx-auto border rounded-md w-4/6 py-3 px-7">
            @if($order->is_paid == false && $order->payment_receipt == null)
                <form action="{{route('submit_payment_receipt', $order)}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <label for="payment_receipt" class="text-lg">Unggah Bukti Pembayaran</label>
                    <div class="pt-3">
                    <input type="file" name="payment_receipt" id="payment_receipt" class="border rounded-md"> <span><button type="submit" class="bg-blue-700 px-4 py-2 rounded text-white hover:bg-blue-500">Kirim</button></span>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
</body>
</html>
@endsection