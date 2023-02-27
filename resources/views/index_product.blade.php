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
<div class="container">
    <div class="max-w-5xl mx-auto mt-16 border rounded-lg">
            <div class="flex items-center justify-center my-3">
                <nav>
                    <ul class="flex flex-col border border-gray-100 rounded-lg md:flex-row md:space-x-7 md:mt-0 md:text-sm md:font-medium md:border-0 dark:border-gray-700">
                        <li>
                        <div class="p-2 rounded hover:bg-gray-100">
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-gray-900 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="Biodata Diri">Buku Antologi Cerita Pendek</a>
                        </div>
                        </li>
                        <li>
                        <div class="p-2 rounded hover:bg-gray-100">
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-gray-900 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Buku Antologi Puisi</a>
                        </div>
                        </li>
                        <li>
                        <div class="p-2 rounded hover:bg-gray-100">
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-gray-900 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Novel</a>
                        </div>
                        </li>
                        <li>
                        <div class="p-2 rounded hover:bg-gray-100">
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-gray-900 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="Biodata Diri">Buku Antologi Artikel</a>
                        </div>
                        </li>
                </nav>
            </div>
            <hr>
            @foreach($products as $product)
                <p>Name : {{$product->name}}</p>
                <img src="{{('storage/' . $product->image)}}" alt="" height = "100px">
                <form action="{{route('show_product', $product)}}" method="get">
                <button type="submit">Show Detail</button>
                </form>
                
                <form action="{{route('edit_product', $product)}}" method="get">
                <button type="submit">Edit Product</button>
                </form>
                
                <form action="{{route('delete_product', $product)}}" method="post">
                @method('delete')
                @csrf
                <button type="submit">Delete Product</button>
            </form>
            @endforeach
    </div>
</div>
</body>
</html>
@endsection