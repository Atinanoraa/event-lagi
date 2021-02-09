<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function show() {
        return view('layout.register');
    }

    public function save(Request $request) {
        $password = $request->input('password');
        $pass = bcrypt($password);

        $data_user = User::create([
            "name" => $request -> input("name"),
            "email" => $request -> input("email"),
            "password" => $pass,
            "account_status" => 2,
            "photo" => "default-profile.png",
        ]);

        return redirect(url("login"))
                ->with("status", "Success to sign up.");
    }
}
