<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KategoriTiket;
use App\Event;
use Session;

class TiketKategoriController extends Controller
{
    function list(){
        $data_tiket = KategoriTiket::all();
        $data_event = Event::all();
        $data_tiket = DB::table('tiket_kategori')
        ->join('event','tiket_kategori.id_event','=','event.id')
        ->select('event.*','tiket_kategori.*')
        ->paginate(5);
        return view('tiket.tiket-list')
            ->with('data_event', $data_event)
            ->with('data_tiket', $data_tiket);
    }

    function create(){
        $data_tiket = KategoriTiket::all();
        $data_event = Event::all();
        $data_tiket = DB::table('tiket_kategori')
        ->leftjoin('event','tiket_kategori.id_event','=','event.id')
        ->select('event.*','tiket_kategori.*');
        return view('tiket.tiket-create')
            ->with('data_event', $data_event)
            ->with('data_tiket', $data_tiket);
    }

    function save(Request $request){
        $data_tiket = KategoriTiket::create([
            "id_event"=>$request->input("id_event"),
            "jenis"=>$request->input("jenis"),
            "harga"=>$request->input("harga"),
        ]);
        if($data_tiket){
            Session::flash('sukses','Sukses Menyimpan Data');
            return redirect(url('admin/tiket'))
                    ->with("data_tiket",$data_tiket);
        }else{
            Session::flash('gagal','ERROR');
            return redirect(url('admin/tiket'));
        }
    }

    function edit($id, Request $request)
    {
        $data_tiket = KategoriTiket::find($id);
        return view ('tiket.tiket-edit')
                ->with('data_tiket',$data_tiket);
    }

    function update($id,Request $request)
    {
        $data_tiket = KategoriTiket::find($id);
        $data_tiket->jenis = $request->input("jenis");
        $data_tiket->harga = $request->input("harga");
        {
            $data_tiket->save();
            if($data_tiket){
                Session::flash('sukses','Sukses Update Data');
                return redirect(url('admin/tiket'));
            }else{
                Session::flash('gagal','Gagal Update Data');
                return redirect(url('admin/tiket'));
            }
        }

    }

    function delete($id, Request $request){
        $data_tiket = KategoriTiket::find($id);
        $data_tiket -> delete();
        if($data_tiket){
            Session::flash('sukses','Sukses Delete Data');
            return redirect(url('admin/tiket'));
        }else{
            Session::flash('gagal','Gagal Delete Data');
            return redirect(url('admin/tiket'));
        }

    }
}
