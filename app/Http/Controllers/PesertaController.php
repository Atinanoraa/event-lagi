<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use Session;

class PesertaController extends Controller
{
    function list(){
        $data_peserta = Peserta::all();
        return view('peserta.peserta-list')
                ->with('data_peserta',$data_peserta);
    }

    function create(){
        return view('peserta.peserta-create');
    }

    function save(Request $request){
        $data_peserta = Peserta::create([
            "nama"=>$request->input("nama"),
            "email"=>$request->input("email"),
            "no_hp"=>$request->input("no_hp"),
            "ktp"=>$request->input("ktp"),

        ]);
        if($data_peserta){
            Session::flash('sukses','Sukses Menyimpan Data');
            return redirect(url('admin/peserta'))
                    ->with("data_peserta",$data_peserta);
        }else{
            Session::flash('gagal','ERROR');
            return redirect(url('admin/peserta'));
        }
    }

    function edit($id, Request $request)
    {
        $data_peserta = Peserta::find($id);
        return view ('peserta.peserta-edit')
                ->with('data_peserta',$data_peserta);
    }

    function update($id,Request $request)
    {
        $data_peserta = Peserta::find($id);
        $data_peserta->nama = $request->input("nama");
        $data_peserta->email = $request->input("email");
        $data_peserta->no_hp = $request->input("no_hp");
        $data_peserta->ktp = $request->input("ktp");

    {
        $data_peserta->save();
            if($data_peserta){
                Session::flash('sukses','Sukses Update Data');
                return redirect(url('admin/peserta'));
            }else{
                Session::flash('gagal','Gagal Update Data');
                return redirect(url('admin/peserta'));
            }
        }
    }

    function delete($id, Request $request){
        $data_peserta = Peserta::find($id);
        $data_peserta -> delete();
        if($data_peserta){
            Session::flash('sukses','Sukses Delete Data');
            return redirect(url('admin/peserta'));
        }else{
            Session::flash('gagal','Gagal Delete Data');
            return redirect(url('admin/peserta'));
        }
    }
}
