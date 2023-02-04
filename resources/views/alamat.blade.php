@extends('layouts.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<div class="container">
    <div class="max-w-5xl mx-auto mt-16 border rounded-lg">
            <div class="flex items-center justify-center my-3">
                <nav>
                    <ul class="flex flex-col border border-gray-100 rounded-lg md:flex-row md:space-x-10 md:mt-0 md:text-sm md:font-medium md:border-0 dark:border-gray-700">
                        <li>
                        <div class="p-1 rounded hover:bg-gray-100">
                        <a href="{{route('edit_profile', $user)}}" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-gray-900 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="Biodata Diri">Biodata Diri</a>
                        </div>
                        </li>
                        <li>
                        <div class="p-1 rounded hover:bg-gray-100">
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-gray-900 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Alamat</a>
                        </div>
                        </li>
                        <li>
                        <div class="p-1 rounded hover:bg-gray-100">
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-gray-900 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Edit Alamat</a>
                        </div>
                        </li>
                        <li>
                        <div class="p-1 rounded hover:bg-gray-100">
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-gray-900 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kata Sandi</a>
                        </div>
                        </li>
                </nav>
            </div>
            <hr>
                <div class="card-header text-base font-normal mx-5 my-7">
                    {{ __('Alamat Saya') }}
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                    @endif
                    <p>Alamat : {{$user->alamat}} <a href="{{route('edit_alamat', $user)}}" class="text-blue-700">edit</a></p>
                    </form>
                </div>
    </div>
</div>
</body>
</html>
@endsection