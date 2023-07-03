@extends('layouts.navbar-login')
@section('content')
<div class="container my-16">
    <div class="mx-60 border rounded-lg">
        <div class="bg-gray-100 py-3 pl-8 text-xl text-gray-500">{{ __('Daftar') }}</div>
            <hr>
            <div class="bg-white-500 p-2 rounded-b-lg">
                <div class="card-body py-4 px-10">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="grid grid-cols-2 mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-red-500">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 mb-3">
                            <label for="telepon" class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>

                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-red-500">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-red-500">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Alamat Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-red-500">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Kata Sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-red-500">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-gray-500 text-right pr-16">{{ __('Konfirmasi Kata Sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 mb-0">
                            <div>

                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-500">
                                    <p class="text-white">{{ __('Daftar') }}</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
