<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prediction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class PredictionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function prediksi()
    {
        return view('prediksi/form_prediksi');
    }

    public function index_prediksi()
    {
        $predictions = Prediction::all();
        return view('prediksi/index_prediksi', compact('predictions'));
    }

    public function delete_prediksi(Prediction $prediction)
    {
        $prediction->delete();
        return Redirect::route('index_prediksi');
    }

    public function show_prediksi(Prediction $prediction)
    {
        return view('prediksi/show_prediksi', compact('prediction'));   
    }

    public function store_prediksi(Request $request)
    {
        $request->validate([
            'judul_buku'=> 'required',
            'penjualan_max'=> 'required',
            'penjualan_min'=> 'required',
            'persediaan_max'=> 'required',
            'persediaan_min'=>'required',
            'cetak_max'=> 'required',
            'cetak_min'=>'required',
            'banyak_terjual'=>'required',
            'persediaan_buku'=>'required',
        ]);

        $prediction = Prediction::create([
            'judul_buku'=> $request->judul_buku,
            'penjualan_max'=>$request->penjualan_max,
            'penjualan_min'=>$request->penjualan_min,
            'persediaan_max'=>$request->persediaan_max,
            'persediaan_min'=>$request->persediaan_min,
            'cetak_max'=>$request->cetak_max,
            'cetak_min'=>$request->cetak_min,
            'banyak_terjual'=>$request->banyak_terjual,
            'persediaan_buku'=>$request->persediaan_buku,
        ]);

        return Redirect::route('index_prediksi');
    }
}