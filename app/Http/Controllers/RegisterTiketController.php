<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\User;

class RegisterTiketController extends Controller
{
    public function show($id){
        $data_event=Event::find($id);
        return view('navbar.registrasi-tiket')
        ->with('data_event', $data_event);
    }

    public function save(Request $request, $id){
            $password = $request->input('password');
            $pass = bcrypt($password);
            $data_event = Event::find($id);

            $data_user = User::create([
                "name" => $request -> input("name"),
                "email" => $request -> input("email"),
                "password" => $pass,
                "account_status" => 2,
                "photo" => "default-profile.png",
            ]);

            return redirect(url("login-tiket/".$data_event->id))
                    ->with("message", "Silahkan login ulang")
                    ->with('data_user', $data_user)
                    ->with('data_event', $data_event);

    }
}
