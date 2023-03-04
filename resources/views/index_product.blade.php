@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Product</title>
</head>
<body>
<div class="container mt-7 mx-auto md:px-12">
    <!-- awal header bg abu-abu -->
    <div class="mt-12 text-2xl text-gray-500 font-semibold whitespace-nowrap p-2">
    Buku Antologi Cerita Pendek
    </div>
    <hr>
    <!--akhir header bg abu-abu -->

    <div class="p-2">
    <a href="/penulis.ukm.um/dashboard" class="text-blue-700 hover:text-gray-500"> Dashboard</a> <span class="text-gray-500">> Buku Antologi Cerita Pendek</span>
    </div>

    <!-- bagian daftar buku -->
        <div class="flex flex-row items-center justify-center my-3 w-full">
            @foreach($products as $product)
                <div class="px-2">
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <a href="#">
                            <img alt="Placeholder" class="block h-auto w-auto p-3" src="{{('storage/' . $product->image)}}">
                        </a>
                        <hr>
                        <header class="flex items-center justify-between leading-tight px-1 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline text-gray-500" href="#">
                                {{$product->name}}
                                </a>
                            </h1>
                        </header>

                        <div class="flex items-center justify-center">
                            <form action="{{route('show_product', $product)}}" method="get">
                            <button type="submit" class="bg-blue-700 px-3 py-2 rounded text-white text-sm hover:bg-blue-500">Detail Buku</button>
                            </form>
                        </div>

                        <footer class="flex items-center justify-center leading-none md:p-4">
                            <div class="px-1">
                            <form action="{{route('edit_product', $product)}}" method="get">
                            <button type="submit" class="bg-blue-700 px-3 py-2 rounded text-white text-sm hover:bg-blue-500">Edit Buku</button>
                            </form>
                            </div>

                            <div>
                            <form action="{{route('delete_product', $product)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="bg-blue-700 px-3 py-2 rounded text-white text-sm hover:bg-red-500">Hapus Buku</button>
                            </form>
                            </div>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    <!-- akhir bagian daftar buku -->
</div>
</body>
</html>
@endsection