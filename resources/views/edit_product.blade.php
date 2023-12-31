@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<div class="container my-16">
    <div class="mx-60 border rounded-lg">
        <div class="bg-gray-100 py-3 pl-8 text-xl text-gray-500">{{ __('Edit Buku') }}</div>    
        <hr>
            <div class="bg-white-500 p-2 rounded-b-lg">
                <div class="card-body py-4 px-10">
                    <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data">   
                        @method('patch')
                        @csrf
                        <div class="grid grid-cols-2 mb-3">
                            <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Judul Buku') }}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$product->name}}" name="name" placeholder="Judul Buku">
                                </div>
                        </div>
                        <div class="grid grid-cols-2 mb-3">
                                <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Nama Penulis') }}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$product->writer}}" name="writer" placeholder="Nama Penulis">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 mb-3">
                                <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Sinopsis Buku') }}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$product->sinopsis}}" name="sinopsis" placeholder="Sinopsis Buku">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 mb-3">
                                <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Detail Buku') }}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$product->description}}" name="description" placeholder="Detail Buku">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 mb-3">
                                <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Jenis Buku') }}</label>
                                <div class="col-md-7">
                                    <select class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="types_id" value="{{$product->types_id}}">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->jenis_buku}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 mb-3">
                                <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Harga Buku') }}</label>
                                <div class="col-md-7">
                                    <input type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$product->price}}" name="price" placeholder="Harga Buku">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 mb-3">
                                <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Stok Buku') }}</label>
                                <div class="col-md-7">
                                    <input type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$product->stock}}" name="stock" placeholder="Stok">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 mb-3">
                                <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Gambar Buku') }}</label>
                                <div class="col-md-7">
                                    <input type="file" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="image">
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div>
                                    
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-500">
                                        <p class="text-white">{{ __('Update Data') }}</p>
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection