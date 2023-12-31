@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Prediksi</title>
</head>
<body>
@php
    $x1 = $prediction->banyak_terjual - $prediction->penjualan_min;
    $gap1 = $prediction->penjualan_max - $prediction->penjualan_min;
    $penjualan_naik = $x1/$gap1;

    $x2 = $prediction->penjualan_max - $prediction->banyak_terjual;
    $gap2 = $prediction->penjualan_max - $prediction->penjualan_min;
    $penjualan_turun = $x2/$gap2;

    $y1 = $prediction->persediaan_buku - $prediction->persediaan_min;
    $gap3 = $prediction->persediaan_max - $prediction->persediaan_min;
    $persediaan_banyak = $y1/$gap3;

    $y2 = $prediction->persediaan_max - $prediction->persediaan_buku;
    $gap4 = $prediction->persediaan_max - $prediction->persediaan_min;
    $persediaan_sedikit = $y2/$gap4;
@endphp

<div class="container mt-7 mx-auto md:px-12">
    <!-- awal header bg abu-abu -->
    <div class="mt-10 text-2xl text-gray-500 font-semibold whitespace-nowrap p-2">
        ID Prediksi {{$prediction['id']}} - Proses Prediksi Buku {{$prediction['judul_buku']}}
    </div>
    <hr>
    <div class="px-2 pt-2">
        <a href="/prediksi/index" class="text-blue-700 hover:text-gray-500"> Daftar Data Prediksi</a> <span class="text-gray-500">>  Proses Prediksi</span>
    </div>

    <div class="pt-5 ml-2">

    <!-- tabel variabel maksimum dan minimum -->
    <table class="border border-spacing-3 border-separate border-slate-300 rounded-md">
        <thead>
            <tr>
                <th class ="px-2 text-gray-500">Variabel</th>
                <th class ="px-2 text-gray-500">Maksimum</th>
                <th class ="px-2 text-gray-500">Minimum</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center text-gray-500">Penjualan</td>
                <td class="text-center text-gray-500">{{$prediction['penjualan_max']}}</td>
                <td class="text-center text-gray-500">{{$prediction['penjualan_min']}}</td>
            </tr>
            <tr>
                <td class="text-center text-gray-500">Persediaan</td>
                <td class="text-center text-gray-500">{{$prediction['persediaan_max']}}</td>
                <td class="text-center text-gray-500">{{$prediction['persediaan_min']}}</td>
            </tr>
            <tr>
                <td class="text-center text-gray-500">Cetak</td>
                <td class="text-center text-gray-500">{{$prediction['cetak_max']}}</td>
                <td class="text-center text-gray-500">{{$prediction['cetak_min']}}</td>
            </tr>
        </tbody>
    </table>
    <!-- end tabel variabel maksimum dan minimum -->
    <br>
    <!-- tabel variabel nilai x dan y -->
    <table class="border border-spacing-y-3 border-spacing-x-12 border-separate border-slate-300 rounded-md">
        <thead>
            <tr>
                <td class="text-center font-semibold text-gray-500">Variabel</td>
                <td class="text-center font-semibold text-gray-500">Nilai</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center text-gray-500">Nilai x Penjualan</td>
                <td class="text-center text-gray-500">{{$prediction['banyak_terjual']}}</td>
            </tr>
            <tr>
                <td class="text-center text-gray-500">Nilai y Persediaan</td>
                <td class="text-center text-gray-500">{{$prediction['persediaan_buku']}}</td>
            </tr>
        </tbody>
    </table>
    <!-- end tabel variabel nilai x dan y -->
    <br>
    <!-- tabel penjualan turun dan naik -->
    <table class="border border-spacing-5 border-separate border-slate-300 rounded-md">
        <thead>
            <tr>
                <td class="font-semibold text-gray-500">Fungsi Keanggotaan Penjualan</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-gray-500"><button data-tooltip-target="tooltip-default" type="button" class="focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Penjualan Naik [{{$prediction['banyak_terjual']}}]</button>
                    <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">Nilai Fungsi Keanggotaan Penjualan Naik dengan Variabel Penjualan {{$prediction['banyak_terjual']}}<div class="tooltip-arrow" data-popper-arrow></div>
                    </div></td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">(x - penjualan_min) / (penjualan_max - penjualan_min)</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">({{$prediction['banyak_terjual']}} - {{$prediction['penjualan_min']}}) / ({{$prediction['penjualan_max']}} - {{$prediction['penjualan_min']}})</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">{{$penjualan_naik}}</td>
            </tr>
            <tr>
                <td class="text-gray-500"><button data-tooltip-target="tooltip-default2" type="button" class="focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Penjualan Turun [{{$prediction['banyak_terjual']}}]</button>
                    <div id="tooltip-default2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">Nilai Fungsi Keanggotaan Penjualan Turun dengan Variabel Penjualan {{$prediction['banyak_terjual']}}<div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">(penjualan_max - x) / (penjualan_max - penjualan_min)</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">({{$prediction['penjualan_max']}} - {{$prediction['banyak_terjual']}}) / ({{$prediction['penjualan_max']}} - {{$prediction['penjualan_min']}})</td> 
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">{{$penjualan_turun}}</td> 
            </tr>
        </tbody>
    </table>
    <!-- end tabel penjualan turun dan naik -->
    <br>
    <!-- tabel persediaan banyak dan sedikit -->
    <table class="border border-spacing-5 border-separate border-slate-300 rounded-md">
        <thead>
            <tr>
                <td class="font-semibold text-gray-500">Fungsi Keanggotaan Persediaan</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-gray-500"><button data-tooltip-target="tooltip-default3" type="button" class="focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Persediaan Banyak [{{$prediction['persediaan_buku']}}]</button>
                    <div id="tooltip-default3" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">Nilai Fungsi Keanggotaan Persediaan Banyak dengan Variabel Persediaan {{$prediction['persediaan_buku']}}<div class="tooltip-arrow" data-popper-arrow></div>
                    </div></td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">(y - persediaan_min) / (persediaan_max - persediaan_min)</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">({{$prediction['persediaan_buku']}} - {{$prediction['persediaan_min']}}) / ({{$prediction['persediaan_max']}} - {{$prediction['persediaan_min']}})</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">{{$persediaan_banyak}}</td>
            </tr>
            <tr>
                <td class="text-gray-500"><button data-tooltip-target="tooltip-default4" type="button" class="focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Persediaan Sedikit [{{$prediction['persediaan_buku']}}]</button>
                    <div id="tooltip-default4" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">Nilai Fungsi Keanggotaan Persediaan Sedikit dengan Variabel Persediaan {{$prediction['persediaan_buku']}}<div class="tooltip-arrow" data-popper-arrow></div>
                    </div></td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">(persediaan_max - y) / (persediaan_max - persediaan_min)</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">({{$prediction['persediaan_max']}} - {{$prediction['persediaan_buku']}}) / ({{$prediction['persediaan_max']}} - {{$prediction['persediaan_min']}})</td> 
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">{{$persediaan_sedikit}}</td> 
            </tr>
        </tbody>
    </table>
    <!-- rules -->
    @php
        $rule1 = min($penjualan_turun,$persediaan_sedikit);
        $rule2 = min($penjualan_turun, $persediaan_banyak);
        $rule3 = min($penjualan_naik, $persediaan_sedikit);
        $rule4 = min($penjualan_naik, $persediaan_banyak);
    @endphp

    <br>
    <table class="border border-spacing-5 border-separate border-slate-300 rounded-md">
        <thead>
            <tr>
                <td class="font-semibold text-gray-500">Rules / Aturan</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-gray-500">R1</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">min(Penjualan Turun, Persediaan Sedikit)</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">min({{$penjualan_turun}}, {{$persediaan_sedikit}})</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">{{$rule1}}</td>
            </tr>
            <tr>
                <td class="text-gray-500">R2</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">min(Penjualan Turun, Persediaan Banyak)</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">min({{$penjualan_turun}}, {{$persediaan_banyak}})</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">{{$rule2}}</td>
            </tr>
            <tr>
                <td class="text-gray-500">R3</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">min(Penjualan Naik, Persediaan Sedikit)</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">min({{$penjualan_naik}}, {{$persediaan_sedikit}})</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">{{$rule3}}</td>
            </tr>
            <tr>
                <td class="text-gray-500">R4</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">min(Penjualan Naik, Persediaan Banyak)</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">min({{$penjualan_naik}}, {{$persediaan_banyak}})</td>
                <td class="text-gray-500">=</td>
                <td class="text-gray-500">{{$rule4}}</td>
            </tr>
        </tbody>
    </table>

    <!-- perhitungan batas a1 dan a2 -->
    @php
        $A1 = max($rule1, $rule2, $rule3, $rule4);
        $batas_cetak_naik = $A1*($prediction->cetak_max - $prediction->cetak_min) + $prediction->cetak_min;
        $batas_cetak_turun = $prediction->cetak_max - ($A1*($prediction->cetak_max - $prediction->cetak_min));
    @endphp

    <!-- Defuzzyfikasi -->
    <!--buat ngitung rataan MOM tapi dari sisi kiri-->
    @php
    $batas_a1 = $A1*($prediction->cetak_max - $batas_cetak_naik) + $batas_cetak_naik;
    $batas_a2 = $prediction->cetak_max - ($A1*($prediction->cetak_max - $batas_cetak_naik));
    $MOM1 = (($batas_a1 + $batas_a2)/2);
    $MOM3 = round(($batas_a1 + $batas_a2)/2);
    @endphp

    <!--buat ngitung rataan MOM tapi dari sisi kanan-->
    @php
    $batas_a3 = $A1*($batas_cetak_turun - $prediction->cetak_min) + $prediction->cetak_min;
    $batas_a4 = $batas_cetak_turun - $A1*($batas_cetak_turun - $prediction->cetak_min);
    $MOM2 = (($batas_a3 + $batas_a4)/2);
    $MOM4 = round(($batas_a3 + $batas_a4)/2);
    @endphp

    <br>
    <table class="border border-spacing-5 border-separate border-slate-300 rounded-md">
        <thead>
            <tr>
                <td class="text-blue-700">Hasil Prediksi Buku yang Harus dicetak Tahun Ini</td>
                <td class="text-blue-700">=</td>
                <td class="text-blue-700">{{$rule2 + $rule1 > $rule4 + $rule3 ? $MOM2 : $MOM1}}</td>
                <td class="text-blue-700">≈</td>
                <td class="text-blue-700">{{$rule2 + $rule1 > $rule4 + $rule3 ? $MOM4 : $MOM3}}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-blue-700">Total Harga Buku yang Harus dicetak tahun ini</td>
                <td class="text-blue-700">=</td>
                <td class="text-blue-700">Rp{{$rule2 + $rule1 > $rule4 + $rule3 ? $MOM2*40000 : $MOM1*40000}}</td>
            </tr>
        </tbody>
    </table>
    <!-- end tabel penjualan turun dan naik -->
    </div>
</div>
</div>
</body>
<footer class="pt-8 bg-white dark:bg-gray-900">
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