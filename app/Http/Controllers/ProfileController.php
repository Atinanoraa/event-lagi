<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Peserta;
use App\Tiket;
use App\User;

class ProfileController extends Controller
{
    public function list($id){
        // $data_eventtiket = Auth::user()->id;
        // $data_eventtiket = Tiket::paginate(5);
        // return view('profile-peserta.profile', ['data_eventtiket' => $data_eventtiket]);

        // $data_eventtiket=Tiket::all();
        // return view('profile.profile')
        //     ->with("data_eventtiket",$data_eventtiket);

        $data_user = User::find($id);
        return view('profile.profile')
            ->with('data_user', $data_user);
    }

    public function update($id, Request $request) {
        $imgName = $request->photo->getClientOriginalName() . '-' . time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $imgName);

        $data_user = User::find($id);
        $data_user -> photo = $imgName;
        $data_user -> save();
        return redirect(url("users/profile/".$data_user->id));
    }
}
