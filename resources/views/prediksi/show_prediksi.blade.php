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
        <a href="/prediksi/index" class="text-blue-700 hover:text-gray-500"> Index Prediksi</a> <span class="text-gray-500">>  Proses Prediksi</span>
    </div>

    <div class="pt-5 ml-2">

    <!-- tabel variabel maksimum dan minimum -->
    <table class="border border-spacing-3 border-separate border-slate-400 rounded-md">
        <thead>
            <tr>
                <th class ="px-2">Variabel</th>
                <th class ="px-2">Maksimum</th>
                <th class ="px-2">Minimum</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">Penjualan</td>
                <td class="text-center">{{$prediction['penjualan_max']}}</td>
                <td class="text-center">{{$prediction['penjualan_min']}}</td>
            </tr>
            <tr>
                <td class="text-center">Persediaan</td>
                <td class="text-center">{{$prediction['persediaan_max']}}</td>
                <td class="text-center">{{$prediction['persediaan_min']}}</td>
            </tr>
            <tr>
                <td class="text-center">Cetak</td>
                <td class="text-center">{{$prediction['cetak_max']}}</td>
                <td class="text-center">{{$prediction['cetak_min']}}</td>
            </tr>
        </tbody>
    </table>
    <!-- end tabel variabel maksimum dan minimum -->
    <br>
    <!-- tabel variabel nilai x dan y -->
    <table class="border border-spacing-y-3 border-spacing-x-12 border-separate border-slate-400 rounded-md">
        <thead>
            <tr>
                <td class="text-center font-semibold">Variabel</td>
                <td class="text-center font-semibold">Nilai</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">Nilai x Penjualan</td>
                <td class="text-center">{{$prediction['banyak_terjual']}}</td>
            </tr>
            <tr>
                <td class="text-center">Nilai y Persediaan</td>
                <td class="text-center">{{$prediction['persediaan_buku']}}</td>
            </tr>
        </tbody>
    </table>
    <!-- end tabel variabel nilai x dan y -->
    <br>
    <!-- tabel penjualan turun dan naik -->
    <table class="border border-spacing-5 border-separate border-slate-400 rounded-md">
        <thead>
            <tr>
                <td class="font-semibold">Penjualan Turun dan Naik</td>
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
                <td>Penjualan Naik [{{$prediction['banyak_terjual']}}]</td>
                <td>=</td>
                <td>(x - penjualan_min) / (penjualan_max - penjualan_min)</td>
                <td>=</td>
                <td>({{$prediction['banyak_terjual']}} - {{$prediction['penjualan_min']}}) / ({{$prediction['penjualan_max']}} - {{$prediction['penjualan_min']}})</td>
                <td>=</td>
                <td>{{$penjualan_naik}}</td>
            </tr>
            <tr>
                <td>Penjualan Turun [{{$prediction['banyak_terjual']}}]</td>
                <td>=</td>
                <td>(penjualan_max - x) / (penjualan_max - penjualan_min)</td>
                <td>=</td>
                <td>({{$prediction['penjualan_max']}} - {{$prediction['banyak_terjual']}}) / ({{$prediction['penjualan_max']}} - {{$prediction['penjualan_min']}})</td> 
                <td>=</td>
                <td>{{$penjualan_turun}}</td> 
            </tr>
        </tbody>
    </table>
    <!-- end tabel penjualan turun dan naik -->
    <br>
    <!-- tabel persediaan banyak dan sedikit -->
    <table class="border border-spacing-5 border-separate border-slate-400 rounded-md">
        <thead>
            <tr>
                <td class="font-semibold">Persediaan Banyak dan Sedikit</td>
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
                <td>Persediaan Banyak [{{$prediction['persediaan_buku']}}]</td>
                <td>=</td>
                <td>(y - persediaan_min) / (persediaan_max - persediaan_min)</td>
                <td>=</td>
                <td>({{$prediction['persediaan_buku']}} - {{$prediction['persediaan_min']}}) / ({{$prediction['persediaan_max']}} - {{$prediction['persediaan_min']}})</td>
                <td>=</td>
                <td>{{$persediaan_banyak}}</td>
            </tr>
            <tr>
                <td>Persediaan Sedikit [{{$prediction['persediaan_buku']}}]</td>
                <td>=</td>
                <td>(persediaan_max - y) / (persediaan_max - persediaan_min)</td>
                <td>=</td>
                <td>({{$prediction['persediaan_max']}} - {{$prediction['persediaan_buku']}}) / ({{$prediction['persediaan_max']}} - {{$prediction['persediaan_min']}})</td> 
                <td>=</td>
                <td>{{$persediaan_sedikit}}</td> 
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
    <p>R1:{{$rule1}}</p>
    <p>R2:{{$rule2}}</p>
    <p>R3:{{$rule3}}</p>
    <p>R4:{{$rule4}}</p>

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
    $MOM1 = ($batas_a1 + $batas_a2)/2
    @endphp

    <!--buat ngitung rataan MOM tapi dari sisi kanan-->
    @php
    $batas_a3 = $A1*($batas_cetak_turun - $prediction->cetak_min) + $prediction->cetak_min;
    $batas_a4 = $batas_cetak_turun - $A1*($batas_cetak_turun - $prediction->cetak_min);
    $MOM2 = ($batas_a3 + $batas_a4)/2
    @endphp

    Hasil Prediksi : {{$rule2 + $rule1 > $rule4 + $rule3 ? $MOM2 : $MOM1}}
    <!-- end tabel penjualan turun dan naik -->
    </div>
</body>
</html>
@endsection