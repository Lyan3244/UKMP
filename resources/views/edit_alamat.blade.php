@extends('layouts.navbar')
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
        <div class="bg-gray-100 py-3 flex items-center justify-center text-xl rounded-t-lg text-gray-500">
                    <nav>
                        <ul class="flex flex-col border border-gray-100 rounded-lg md:flex-row md:space-x-16 md:mt-0 md:text-sm md:font-medium md:border-0 dark:border-gray-700">
                            <li>
                            <div class="p-2 rounded hover:bg-gray-100">
                            <a href="{{route('show_profile', $user)}}" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="Biodata Diri">Biodata Diri</a>
                            </div>
                            </li>
                            <li>
                            <div class="p-2 rounded hover:bg-gray-100">
                            <a href="{{route('alamat', $user)}}" class="block py-2 pl-3 pr-4 text-gray-500 rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Alamat</a>
                            </div>
                            </li>
                    </nav>
            </div>
            <hr>
                <div class="card-header h-32 text-base font-normal mx-10 my-5">
                    <form action="{{route('update_alamat', $user)}}" method="post">
                    @csrf
                        <label class="text-sm font-medium text-gray-900 dark:text-white">Alamat</label><br>
                        <input class="mt-2 mb-5 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="alamat" value="{{$user->alamat}}"><br>
                        <button type="submit" class="text-white float-right bg-blue-700 hover:bg-blue-500 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700">Simpan</button>
                    </form>
                </div>
    </div>
</div>
</body>
</html>
@endsection