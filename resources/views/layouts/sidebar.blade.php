<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div>
  <nav class="fixed z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 top-0">
    <div class="px-2 py-2 lg:px-5 lg:pl-3">
      <div class = "flex flex-row justify-between">
        <!-- fitur logo web -->
        <div class="flex items-center justify-start">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
          </button>
          <a href="/penulis.ukm.um/dashboard" class="flex ml-2 md:mr-24">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" />
            <span class="self-center text-2xl font-bold sm:text-2xl text-gray-500 whitespace-nowrap dark:text-white">UKMP UM</span>
          </a>
        </div>
        <!-- lagi coba wrapping search sama logo user -->
        <div class="flex flex-row items-center">
            <!-- fitur search -->
        <div class="pr-5">
            <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1" >
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
              <span class="sr-only">Search</span>
            </button>
          <div class="relative hidden md:block">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
              <span class="sr-only">Search icon</span>
            </div>
            <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
          </div>
        </div>
        <!-- fitur logo user -->
            <div class = "flex items-center mr-5">
              <div>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                </button>
              </div>
        <!-- fitur dropdown logo user -->
              <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow-[0px_0px_5px_2px_rgba(0,0,0,0.1)] dark:divide-gray-600" id="dropdown-user">
                <ul class="py-1">
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white" role="menuitem">Keranjang</a>
                  </li>
                  <li>
                    <a href="/cart" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white" role="menuitem">Pesanan</a>
                  </li>
                  <li>
                    <a href="{{route('show_profile')}}" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white" role="menuitem">Pengaturan</a>
                  </li>

                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                      <li class="nav-item">
                        <a class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white" role="menuitem" href="{{route('login')}}">{{ __('Login') }}</a>
                      </li>
                    @endif

                    @if (Route::has('register'))
                      <li class="nav-item">
                        <a class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white" role="menuitem" href="{{route('register')}}">{{ __('Register') }}</a>
                      </li>
                    @endif
                  @else
                  <li>  
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <a class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white" role="menuitem" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </div>
                  </li>
                  @endguest
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </nav>

  <aside id="logo-sidebar" class="w-64 fixed left-0 top-0 h-screen transition-transform -translate-x-full sm:translate-x-0 z-40 pt-20 border-r border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800 h-full">
        <ul class="space-y-2">
          <li>
            <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-500 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Profil UKMP</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
              <ul id="dropdown-example" class="hidden py-2 space-y-2">
                  <li>
                     <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sejarah</a>
                  </li>
                  <li>
                     <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Visi dan Misi</a>
                  </li>
                  <li>
                     <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Struktur Kepengurusan</a>
                  </li>
                  <li>
                     <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-500 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Program Kerja</a>
                  </li>
            </ul>
          </li>
          <li>
              <a href="#" class="flex items-center p-2 text-base font-normal text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="flex-1 ml-3 whitespace-nowrap">Departemen</span>
              </a>
          </li>
          <li>
              <a href="#" class="flex items-center p-2 text-base font-normal text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="flex-1 ml-3 whitespace-nowrap">Prestasi</span>
              </a>
          </li>
          <li>
              <a href="#" class="flex items-center p-2 text-base font-normal text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="flex-1 ml-3 whitespace-nowrap">Pengumuman</span>
              </a>
          </li>
          <li>
              <a href="#" class="flex items-center p-2 text-base font-normal text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="flex-1 ml-3 whitespace-nowrap">Karya Mingguan UKMP</span>
              </a>
          </li>
          <li>
              <a href="/product" class="flex items-center p-2 text-base font-normal text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="flex-1 ml-3 whitespace-nowrap">Toko Buku UKMP</span>
              </a>
          </li>
          <li>
              <a href="#" class="flex items-center p-2 text-base font-normal text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="flex-1 ml-3 whitespace-nowrap">Zine</span>
              </a>
          </li>
        </ul>
    </div>
  </aside>
        </div>
  <div class="sm:ml-64">
    <div class="m-4 p-4">
        @yield('content')
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>