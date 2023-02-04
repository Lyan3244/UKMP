<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit_profile(User $user)
    {
        return view('profile/edit_profile', compact('user'));
    }

    public function show_profile(User $user)
    {
        $user = Auth::user();
        return view('profile/show_profile', compact('user'));
    }

    public function update_profile(User $user, Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'password'=> 'required|min:8|confirmed'
        ]);

        $user->update([
            'name'=>$request->name,
            'password'=>Hash::make($request->password)
        ]);

        return Redirect::route('show_profile');
    }

    public function alamat(User $user)
    {
        $user = Auth::user();
        return view('/alamat', compact('user'));
    }

    public function edit_alamat(User $user)
    {
        return view('/edit_alamat', compact('user'));
    }

    public function update_alamat(User $user, Request $request)
    {
        $request->validate([
            'alamat'=> 'required',
        ]);

        $user->update([
            'alamat'=>$request->alamat,
        ]);

        return Redirect::route('alamat');
    }

}
