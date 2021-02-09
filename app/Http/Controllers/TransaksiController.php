<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Transaksi;
use App\Peserta;
use App\Tiket;

class TransaksiController extends Controller
{
    function list(){
        $data_transaksi = Transaksi::all();
        $data_peserta = Peserta::all();
        $data_transaksi = DB::table('transaksi')
        ->leftjoin('peserta', 'peserta.id', '=', 'transaksi.id_peserta')
        ->select('peserta.*','transaksi.*')
        ->paginate(5);
        return view('transaksi.transaksi-list')
                ->with('data_peserta',$data_peserta)
                ->with('data_transaksi',$data_transaksi);
    }

    function create(){
        $data_transaksi = Transaksi::all();
        $data_peserta = Peserta::all();
        $data_transaksi = DB::table('transaksi')
        ->join('peserta', 'peserta.id', '=', 'transaksi.id_peserta')
        ->select('peserta.*','transaksi.*')
        ->paginate(5);
        return view('transaksi.transaksi-create')
                ->with('data_peserta',$data_peserta)
                ->with('data_transaksi',$data_transaksi);
    }

    function save(Request $request){
        $imgName = $request->bukti_up->getClientOriginalName() . '-' . time() . '.' . $request->bukti_up->extension();
        $request->bukti_up->move(public_path('images'), $imgName);

        $data_transaksi = Transaksi::create([
            "id_peserta"=>$request->input("nama"),
            "id_eventtiket"=>$request->input("id_eventtiket"),
            "status"=>$request->input("status"),
            "bukti_up"=>$imgName,
            "qr_code"=>$request->input("qr_code"),

        ]);
        if($data_transaksi){
            Session::flash('sukses','Sukses Menyimpan Data');
            return redirect(url('admin/transaksi'))
                    ->with("data_transaksi",$data_transaksi);
        }else{
            Session::flash('gagal','ERROR');
            return redirect(url('admin/transaksi'));
        }
    }

    function delete($id, Request $request){
        $data_transaksi = Transaksi::find($id);
        $data_transaksi -> delete();
        if($data_transaksi){
            Session::flash('sukses','Sukses Delete Data');
            return redirect(url('admin/transaksi'));
        }else{
            Session::flash('gagal','Gagal Delete Data');
            return redirect(url('admin/transaksi'));
        }
    }

    function edit($id){
        $data_transaksi = Transaksi::find($id);
        $data_peserta = DB::table('transaksi')
        ->leftjoin('peserta', 'peserta.id', '=', 'transaksi.id_peserta')
        ->select('peserta.*','transaksi.*')
        ->paginate(5);

        return view('transaksi.transaksi-edit')
                ->with('data_peserta',$data_peserta)
                ->with('data_transaksi',$data_transaksi);
    }

    function update($id, Request $request){

        $imgName = $request->bukti_up->getClientOriginalName() . '-' . time() . '.' . $request->bukti_up->extension();
        $request->bukti_up->move(public_path('images'), $imgName);

        $data_transaksi = Transaksi::find($id);
        $data_transaksi->id_eventtiket=$request->input("id_eventtiket");
        $data_transaksi->id_peserta=$request->input("nama");
        $data_transaksi->status=$request->input("status");
        $data_transaksi->bukti_up=$imgName;
        $data_transaksi->qr_code=$request->input("qr_code");

            {
                $data_transaksi->save();
                if($data_transaksi){
                    Session::flash('sukses','Sukses Menyimpan Data');
                    return redirect(url('admin/transaksi'))
                            ->with("data_transaksi",$data_transaksi);
                }else{
                    Session::flash('gagal','ERROR');
                    return redirect(url('admin/transaksi'));
                }

            }
        }

}
