@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Penjualan</title>
</head>
<body>
<div class="container mt-16 mb-10">
    <div class="mx-60 border rounded-lg">
        <div class="bg-gray-100 py-3 pl-8 text-xl text-gray-500">{{ __('Tambah Data Prediksi') }}</div>    
            <hr>
            <div class="bg-white-500 p-2 rounded-b-lg">
                <div class="card-body py-4 px-10">
                <form action="{{route('store_prediksi')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Judul Buku') }}</label>
                        <div class="col-md-7">
                            <input id="judul_buku" type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="judul_buku" value="{{ old('judul_buku') }}" required autocomplete="judul_buku" placeholder="Judul Buku">
                        @error('judul_buku')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Penjualan Maksimum') }}</label>
                        <div class="col-md-7">
                            <input id="penjualan_max" type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="penjualan_max" value="{{ old('penjualan_max') }}" required autocomplete="penjualan_max" placeholder="Penjualan Maksimum">
                        @error('penjualan_max')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Penjualan Minimum') }}</label>
                        <div class="col-md-7">
                            <input id="penjualan_min" type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="penjualan_min" value="{{ old('penjualan_min') }}" required autocomplete="penjualan_min" placeholder="Penjualan Minimum">
                        @error('penjualan_min')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Persediaan Maksimum') }}</label>
                        <div class="col-md-7">
                            <input id="persediaan_max" type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="persediaan_max" value="{{ old('persediaan_max') }}" required autocomplete="persediaan_max" placeholder="Persediaan Maksimum">
                        @error('persediaan_max')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Persediaan Minimum') }}</label>
                        <div class="col-md-7">
                            <input id="persediaan_min" type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="persediaan_min" value="{{ old('persediaan_min') }}" required autocomplete="persediaan_min" placeholder="Persediaan Minimum">
                        @error('persediaan_min')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Cetak Maksimum') }}</label>
                        <div class="col-md-7">
                            <input id="cetak_max" type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="cetak_max" value="{{ old('cetak_max') }}" required autocomplete="cetak_max" placeholder="Cetak Maksimum">
                        @error('cetak_max')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Cetak Minimum') }}</label>
                        <div class="col-md-7">
                            <input id="cetak_min" type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="cetak_min" value="{{ old('cetak_min') }}" required autocomplete="cetak_min" placeholder="Cetak Minimum">
                        @error('cetak_min')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Banyak Pesanan Buku Tahun Ini') }}</label>
                        <div class="col-md-7">
                            <input id="banyak_terjual" type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="banyak_terjual" value="{{ old('banyak_terjual') }}" required autocomplete="banyak_terjual" placeholder="Banyak Pesanan Buku Tahun Ini">
                        @error('banyak_terjual')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mb-3">
                        <label class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Persediaan Buku di Awal Tahun') }}</label>
                        <div class="col-md-7">
                            <input id="persediaan_buku" type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="persediaan_buku" value="{{ old('persediaan_buku') }}" required autocomplete="persediaan_buku" placeholder="Persediaan Buku di Awal Tahun">
                        @error('persediaan_buku')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-red-500">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                                <div>
                                    
                                </div>
                                <div class="col-md-8 offset-md-4">
                                <button type="submit" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-500">
                                    <p class="text-white">{{ __('Tambah Data') }}</p>
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
<footer class="bg-white dark:bg-gray-900">
    <div class="px-4 py-6 bg-gray-100 dark:bg-gray-700 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center ml-6">© 2023 <a href="https://flowbite.com/">Unit Kegiatan Mahasiswa Penulis (UKMP) Universitas Negeri Malang</a>
        </span>
        <div class="flex mt-3 mr-6 space-x-6 sm:justify-center md:mt-0">
            <a href="#" class="text-gray-400 hover:text-blue-700 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                <span class="sr-only">Facebook page</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-700 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                <span class="sr-only">Instagram page</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-700 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                <span class="sr-only">Twitter page</span>
            </a>
        </div>
    </div>
</footer>
</html>
@endsection