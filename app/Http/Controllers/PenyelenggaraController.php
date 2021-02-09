<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyelenggara;
use Session;
use Illuminate\Support\Facades\Hash;

class PenyelenggaraController extends Controller
{
    function list(){
        $data_penyelenggara = Penyelenggara::all();
        return view('penyelenggara.penyelenggara-list')
                ->with('data_penyelenggara',$data_penyelenggara);
    }

    function create(){
        return view('penyelenggara.penyelenggara-create');
    }

    function save(Request $request){
        $data_penyelenggara = Penyelenggara::create([
            "name"=>$request->input("name"),
            "email"=>$request->input("email"),
            "no_hp"=>$request->input("no_hp"),
            "ktp"=>$request->input("ktp"),
            "password"=>(Hash::make($request->input('password'))),
        ]);
        if($data_penyelenggara){
            Session::flash('sukses','Sukses Menyimpan Data');
            return redirect(url('admin/penyelenggara'))
                    ->with("data_penyelenggara",$data_penyelenggara);
        }else{
            Session::flash('gagal','ERROR');
            return redirect(url('admin/penyelenggara'));
        }
    }

    function edit($id, Request $request)
    {
        $data_penyelenggara = Penyelenggara::find($id);
        return view ('penyelenggara.penyelenggara-edit')
                ->with('data_penyelenggara',$data_penyelenggara);
    }

    function update($id,Request $request)
    {
        $data_penyelenggara = Penyelenggara::find($id);
        $data_penyelenggara->name = $request->input("name");
        $data_penyelenggara->email = $request->input("email");
        $data_penyelenggara->no_hp = $request->input("no_hp");
        $data_penyelenggara->ktp = $request->input("ktp");
        $data_penyelenggara->password = $request->input("password");

        {
            $data_penyelenggara->save();
            if($data_penyelenggara){
                Session::flash('sukses','Sukses Update Data');
                return redirect(url('admin/penyelenggara'));
            }else{
                Session::flash('gagal','Gagal Update Data');
                return redirect(url('admin/penyelenggara'));
            }
        }

    }

    function delete($id){
        $data_penyelenggara = Penyelenggara::find($id);
        $data_penyelenggara -> delete();
        if($data_penyelenggara){
            Session::flash('sukses','Sukses Delete Data');
            return redirect(url('admin/penyelenggara'));
        }else{
            Session::flash('gagal','Gagal Delete Data');
            return redirect(url('admin/penyelenggara'));
        }

    }
}
