<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{('Sistem Informasi Penjualan UKMP')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @apply font-sans;
<div>
  <nav class="fixed z-50 w-full bg-white top-0 shadow-md">
    <div class="px-2 py-3 lg:px-5 lg:pl-3">
      <div class = "flex flex-row justify-between">
        <!-- fitur logo web -->
        <div class="flex items-center justify-start ml-5">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
          </button>
          <a href="/penulis.ukm.um/dashboard" class="flex ml-2 md:mr-24">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" />
            <span class="self-center text-3xl font-bold sm:text-3xl text-gray-500 whitespace-nowrap dark:text-white">UKMP UM</span>
          </a>
        </div>
        
        <!-- lagi coba wrapping search sama logo user -->
        <div class="flex flex-row items-center">

              <!-- fitur dropdown toko, prediksi, masuk, dan daftar -->
                    <div class="hidden w-full md:flex md:w-auto mx-4" id="navbar-dropdown">
                      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @guest
                      @if (Route::has('login'))
                        <li>
                          <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Masuk</a>
                        </li>
                      @endif
                      @if (Route::has('register'))
                        <li>
                          <a href="{{ route('register') }}" class="block py-2 pl-3 pr-4 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Daftar</a>
                        </li>
                      @endif
                    @endguest
                      </ul>
                    </div>
                  <!--end fitur-->
                  
                  <!-- fitur logo user -->
                      <div class = "flex items-center mr-5">
                        <div>
                          <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                          </button>
                        </div>
          </div>
        </div>
      </div>
      <!-- fitur dropdown toko, prediksi, masuk, dan daftar yang responsiv-->
      <div class="w-full md:hidden md:flex md:w-auto mx-4" id="navbar-dropdown">
                      <ul class="flex flex-col p-4 m-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:bg-white">
                        <li>
                        <a href="/login" class="block py-2 pl-3 pr-4 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Masuk</a>
                            <!-- Dropdown menu -->
                        </li>
                        <li>
                          <a href="/register" class="block py-2 pl-3 pr-4 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Daftar</a>
                        </li>
                      </ul>
                    </div>
                  <!--end fitur-->
    </div>
  </nav>
                              
  <div>
    <div class="m-4 p-4">
        @yield('content')
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>