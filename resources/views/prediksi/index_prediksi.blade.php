<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Prediksi</title>
</head>
<body>
@foreach($predictions as $prediction)
    <p>Judul Buku : {{$prediction['judul_buku']}} - Banyak buku terjual : {{$prediction['banyak_terjual']}} - Persediaan buku : {{$prediction['persediaan_buku']}}
        <form action="{{route('show_prediksi', $prediction)}}" method="get">
            <button type="submit">Hasil Prediksi</button>
        </form>
    </p>
@endforeach
</body>
</html>