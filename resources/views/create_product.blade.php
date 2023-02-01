@extends('layouts.app2')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Tambah Produk') }}</div>

                <div class="card-body">
                    <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Nama Produk') }}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi Produk') }}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="description" placeholder="Description">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Harga Produk') }}</label>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="price" placeholder="Price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Stok Produk') }}</label>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="stock" placeholder="Stock">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Gambar Produk') }}</label>
                                <div class="col-md-7">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit Data') }}
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