<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function admin()
    {
        $users = User::all();

        return view('index_product', compact('users'));
    }

}
