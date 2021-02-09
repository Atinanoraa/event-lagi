<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('layout.login');
    }

    public function store(Request $request)
    {
        $validate_admin = User::where('email', $request->input('email'))
                                ->first();

        if($validate_admin){

            if(Hash::check($request->input('password'), $validate_admin->password)){
                Auth::loginUsingId($validate_admin->id);
                $request->session()->put('id', $validate_admin->id);
                if($validate_admin->account_status == '1'){
                    return redirect('/admin');
                }
                if($validate_admin->account_status  == '2'){
                    return redirect('/users/'.$validate_admin->id);
                }
            } else{
                return redirect('/login')
                    ->with('account_status', 3)
                    ->with('message', "Oppsss, Email atau Password salah");
            }

        }
        else{
            return redirect('/login')
            ->with('account_status', 3)
            ->with('message', "Oppsss, Email atau Password salah");
        }
    }

    function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
