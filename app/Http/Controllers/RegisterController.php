<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;

class RegisterController extends Controller{

    public function index(){

        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {

        // $request->validate([
        //     'name' => ['required', 'min:3','max:255'],
        //     'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        //     'email' => ['required', 'email:dns', 'unique:users'],
        //     'password' => 'min:3'
        // ]);

        // dd('berhasil');

        $validatedData = $request->validate([
             'name' => 'required|min:3|max:255',
             'username' => 'required|min:3|max:255|unique:users',
             'email' => 'required|email:dns|unique:users',
             'password' => 'required|min:3'
         ]);

         $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration Successfully! Please Login!');
    }
}
