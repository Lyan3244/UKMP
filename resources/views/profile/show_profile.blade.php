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
                <div class="card-header text-base font-normal mx-10 my-5">
                    <p class="text-lg font-medium">Profil {{$user->is_admin ? 'Admin':'Member'}}</p>
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                    @endif
                    <table class="pt-3 border-spacing-2 border-separate">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{$user->name}}</td>
                                <td><a href="{{route('edit_profile', $user)}}" class="text-blue-700">ubah</a></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td>{{$user->telepon}}</td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
    </div>
</div>
</body>
</html>
@endsection