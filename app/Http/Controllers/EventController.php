<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\Penyelenggara;
use Session;

class EventController extends Controller
{
    function list(){
        $data_event = Event::all();
        $data_penyelenggara = Penyelenggara::all();
        $data_event = DB::table('event')
        ->join('penyelenggara', 'penyelenggara.id', '=', 'event.id_penyelenggara')
        ->select('penyelenggara.*', 'event.*')
        ->paginate(5);
        return view('event.event-list')
                ->with('data_penyelenggara', $data_penyelenggara)
                ->with('data_event',$data_event);
    }

    function create(){
        $data_penyelenggara = Penyelenggara::all();
        $data_event = DB::table('event')
        ->join('penyelenggara', 'penyelenggara.id', '=', 'event.id_penyelenggara')
        ->select('penyelenggara.*', 'event.*')
        ->paginate(5);

        return view('event.event-create')
                    ->with('data_penyelenggara', $data_penyelenggara)
                    ->with('data_event', $data_event);
    }

    function save(Request $request){
        $imgName = $request->foto->getClientOriginalName() . '-' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imgName);

        $data_event = Event::create([
            "id_penyelenggara"=>$request->input("penyelenggara"),
            "jenis_event"=>$request->input("jenis_event"),
            "foto"=>$imgName,
            "nama"=>$request->input("nama"),
            "tanggal"=>$request->input("tanggal"),
            "tempat"=>$request->input("tempat"),
            "waktu_mulai"=>$request->input("waktu_mulai"),
            "waktu_selesai"=>$request->input("waktu_selesai"),
            "deskripsi"=>$request->input("deskripsi"),
            "status"=>$request->input("status"),
            "link"=>$request->input("link"),
            "kuota"=>$request->input("kuota"),

        ]);
        if($data_event){
            Session::flash('sukses','Sukses Menyimpan Data');
            return redirect(url('admin/event'))
                    ->with("data_event",$data_event);
        }else{
            Session::flash('gagal','ERROR');
            return redirect(url('admin/event'));
        }
    }

    function edit($id)
    {
        $data_event = Event::find($id);
        $data_penyelenggara = DB::table('event')
        ->leftjoin('penyelenggara', 'penyelenggara.id', '=', 'event.id_penyelenggara')
        ->select('penyelenggara.*', 'event.*')
        ->where('penyelenggara.id',$data_event->id_penyelenggara)
        ->first();

        return view('event.event-edit')
                    ->with('data_penyelenggara', $data_penyelenggara)
                    ->with('data_event', $data_event);
    }

    function update($id,Request $request)
    {
        $imgName = $request->foto->getClientOriginalName() . '-' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imgName);

        $data_event = Event::find($id);
        $data_event->jenis_event = $request->input("jenis_event");
        $data_event->foto = $imgName;
        $data_event->nama = $request->input("nama");
        $data_event->tanggal = $request->input("tanggal");
        $data_event->tempat = $request->input("tempat");
        $data_event->waktu_mulai = $request->input("waktu_mulai");
        $data_event->waktu_selesai = $request->input("waktu_selesai");
        $data_event->deskripsi = $request->input("deskripsi");
        $data_event->status = $request->input("status");
        $data_event->link = $request->input("link");
        $data_event->kuota = $request->input("kuota");
    {
        {
            $data_event->save();
            if($data_event){
                Session::flash('sukses','Sukses Update Data');
                return redirect(url('admin/event'));
            }else{
                Session::flash('gagal','Gagal Update Data');
                return redirect(url('admin/event'));
            }
        }

    }

    }
    function delete($id, Request $request){
        $data_event = Event::find($id);
        $data_event -> delete();
        if($data_event){
            Session::flash('sukses','Sukses Delete Data');
            return redirect(url('admin/event'));
        }else{
            Session::flash('gagal','Gagal Delete Data');
            return redirect(url('admin/event'));
        }
}
}
