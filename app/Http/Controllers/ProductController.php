<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_product()
    {
        $types = Type::all();
        return view('create_product', compact('types'));
    }

    public function store_product(Type $type, Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'price'=> 'required',
            'stock'=> 'required',
            'sinopsis'=>'required',
            'description'=> 'required',
            'image'=> 'required',
            'writer'=>'required',
            'types_id'=>'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        $types_id = $type->id;

        Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'sinopsis'=>$request->sinopsis,
            'description'=>$request->description,
            'image'=>$path,
            'writer'=>$request->writer,
            'types_id'=>$request->types_id
        ]);

        return Redirect::route('index_product');
    }

    public function index_product()
    {
        $products = Product::all();
        return view('index_product', compact('products'));
    }

    public function index_product1()
    {
        $products = Product::all();
        return view('dashboard/dashboard', compact('products'));
    }

    public function show_product(Product $product)
    {
        return view('show_product', compact('product'));
    }
    
    public function edit_product(Product $product)
    {
        $types = Type::all();
        return view('edit_product', compact(['product','types']));
    }

    public function update_product(Product $product, Type $type, Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'writer'=>'required',
            'sinopsis'=>'required',
            'price'=> 'required',
            'stock'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
            'types_id'=>'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        $product->update([
            'name'=>$request->name,
            'writer'=>$request->writer,
            'sinopsis'=>$request->sinopsis,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
            'image'=>$path,
            'types_id'=>$request->types_id
        ]);

        return Redirect::route('index_product');
    }
    
    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::route('index_product');
    }
}