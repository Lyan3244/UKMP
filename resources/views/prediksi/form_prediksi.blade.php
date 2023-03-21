<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Penjualan</title>
</head>
<body>
<form action="{{route('store_prediksi')}}" method="post" enctype="multipart/form-data">
    @csrf
    <p>Judul Buku <input type="text" name="judul_buku"></p>
    <p>Penjualan Maksimum <input type="text" name="penjualan_max"></p>
    <p>Penjualan Minimum <input type="text" name="penjualan_min"></p>
    <p>Persediaan Maksimum <input type="text" name="persediaan_max"></p>
    <p>Persediaan Minimum <input type="text" name="persediaan_min"></p>
    <p>Cetak Maksimum <input type="text" name="cetak_max"></p>
    <p>Cetak Minimum <input type="text" name="cetak_min"></p>
    <p>Banyak Buku yang Terjual <input type="text" name="banyak_terjual"></p>
    <p>Persediaan Buku di UKMP <input type="text" name="persediaan_buku"></p>

    <button type="submit" class="bg-blue-700 px-4 py-2 rounded">
        <p class="text-white">{{ __('Tambah Data Prediksi') }}</p>
    </button>
</form>
</body>
</html>