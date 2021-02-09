<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Event;

class LoginTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_event=Event::find($id);
        return view('navbar.login-tiket')
        ->with('data_event', $data_event);
    }


    public function store(Request $request, $id, $id2)
    {
        $validate_admin = User::where('email', $request->input('email'))
                                ->first();

        if($validate_admin){

            if(Hash::check($request->input('password'), $validate_admin->password)){
                Auth::loginUsingId($validate_admin->id);
                $request->session()->put('id', $validate_admin->id);
                $data_event=Event::find($id);
                $user_data=Auth::user()->id;
                if($validate_admin->account_status  == '2'){
                    return redirect(url('tiket-registrasi/'.$data_event->id."/".$user_data->id))
                    >with('data_event', $data_event)
                    ->with('validate_admin', $validate_admin)
                    ->with('user_data', $user_data);
                }
            } else{
                return redirect(url('login-tiket'))
                    ->with('message', "Oppsss, Email atau Password salah");
            }
        }
        else{
            return redirect(url('login-tiket'))
                ->with('message', "Oppsss, Email atau Password salah");
        }
        // $validate_admin = User::where('email', $request->input('email'))
        //                         ->first();
        // $data_event=Event::find($id);
        // $user_data=User::find($id2);


        // if($validate_admin){

        //     if(Hash::check($request->input('password'), $validate_admin->password)){
        //         Auth::loginUsingId($validate_admin->id);
        //         $request->session()->put('id', $validate_admin->id);
        //         return redirect(url('tiket-registrasi/'.$data_event->id."/".$user_data->id))
        //             ->with('data_event', $data_event)
        //             ->with('validate_admin', $validate_admin)
        //             ->with('user_data', $user_data);

        //     } else{
        //         return redirect(url('login-tiket'))
        //             ->with('message', "Oppsss, Email atau Password salah");
        //     }
        // }
        // else{
        //     return redirect('login-tiket')
        //     ->with('message', "Oppsss, Email atau Password salah");
        // }
    }
}
