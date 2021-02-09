<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Tiket;
use App\Peserta;
use App\Transaksi;
use App\KategoriTiket;
use App\TransaksiDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;

class NavbarController extends Controller
{
    public function index() {
        $data_event=Event::all();
        return view('navbar.landing-page')
        ->with('data_event', $data_event);
    }

    public function detail($id){
        $data_tiket=KategoriTiket::all();
        $data_event = Event::find($id);
        $data_tiket=DB::table('tiket_kategori')
            ->leftjoin('event','event.id','=','tiket_kategori.id_event')
            ->select('event.*','tiket_kategori.*')
            ->where('tiket_kategori.id_event',$data_event->id)
            ->paginate(5);
        return view('navbar.navbar-event')
            ->with('data_event', $data_event)
            ->with('data_tiket',$data_tiket);
    }

    public function tiket(){
        return view('navbar.navbar-tiket');
    }

    public function registrasi($id,$id2){
        $data_tiket=KategoriTiket::all();
        $data_event = Event::find($id);
        $user_data=User::find($id2);
        $data_tiket=DB::table('tiket_kategori')
        ->leftjoin('event','event.id','=','tiket_kategori.id_event')
        ->select('event.*','tiket_kategori.*')
        ->where('tiket_kategori.id_event',$data_event->id)
        ->paginate(5);
        return view('navbar.navbar-tiket')
        ->with('data_event', $data_event)
        ->with('data_tiket',$data_tiket)
        ->with('user_data', $user_data);
    }

    public function save(Request $request){
        $data_kategori = KategoriTiket::find($request->input('id_tiket'));

        $data_eventtiket = Tiket::create([
            "id_event"=>$request->input("id_event"),
            "id_tiket"=>$request->input("id_tiket"),
            "name"=>$request->input("nama"),
            "email"=>$request->input("email"),
            "no_telp"=>$request->input("no_telp"),
            "no_ktp"=>$request->input("no_ktp"),
            "alamat"=>$request->input("alamat"),
        ]);
        $data_transaksi = Transaksi::create([
            "name"=>$request->input("nama"),
            "email"=>$request->input("email"),
            "no_hp"=>$request->input("no_telp"),
            "id_eventtiket"=>$data_eventtiket->id,
            "harga"=>$data_kategori->harga,
            "total"=>$data_kategori->harga,
            "user_id"=>$request->input("user_id"),
        ]);
        $data_transaksidetail = TransaksiDetail::create([
            "transaksi_id"=>$data_transaksi->id,
            "id_eventtiket"=>$data_eventtiket->id,
            "harga"=>$data_kategori->harga,
            "total"=>$data_kategori->harga,

        ]);
        if($data_eventtiket){
            Session::flash('sukses','Sukses Menyimpan Data Pelanggan');
            return redirect(url('tiket-transaksi/'.$data_eventtiket->id."/".$data_transaksi->user_id))
            // id user
                    ->with('data_transaksi',$data_transaksi)
                    ->with("data_eventtiket" , $data_eventtiket)
                    ->with("data_transaksidetail", $data_transaksidetail);
        }else{
            Session::flash('gagal','ERROR');
            return redirect(url('back'));
        }
    }

    public function tikettransaksi($id,$id2){
        $data_event=Event::all();
        $data_event = Event::find($id);
        $user_data=User::find($id2);
        $data_tiket=KategoriTiket::all();
        $data_eventtiket=DB::table('event_tiket')
        ->leftjoin('event','event.id','=','event_tiket.id_event')
        ->leftjoin('tiket_kategori','tiket_kategori.id','=','event_tiket.id_tiket')
        ->leftjoin('transaksi','transaksi.id_eventtiket','=','event_tiket.id')
        ->where('event_tiket.id', $id)
        ->select('event.*','event_tiket.*','tiket_kategori.jenis','transaksi.*')
        ->get();
        return view('navbar.navbar-transaksi')
        ->with('data_event', $data_event)
        ->with('data_tiket',$data_tiket)
        ->with('user_data',$user_data)
        ->with('data_eventtiket',$data_eventtiket);
    }

    public function pengguna($id) {
        $data_event = Event::all();
        $data_transaksi = Transaksi::all();
        $data_user=User::find($id);
        $data_eventtiket=DB::table('event_tiket')
        ->leftjoin('event','event.id','=','event_tiket.id_event')
        ->leftjoin('transaksi','transaksi.id_eventtiket','=','event_tiket.id')
        ->where('transaksi.user_id',$id)
        ->select('event.nama','event_tiket.*','transaksi.*')
        ->get();
        return view('profile.profile-transaksi')
            ->with('data_event', $data_event)
            ->with('data_user', $data_user)
            ->with('data_transaksi', $data_transaksi)
            ->with("data_eventtiket" , $data_eventtiket);
    }

    public function profiletransaksi($id, Request $request){
        $imgName = $request->bukti_up->getClientOriginalName() . $request->bukti_up;
        $request->file('bukti_up')->move(public_path('images'), $imgName);

        // $data_transaksi=DB::table('transaksi')
        // ->leftjoin('event_tiket', 'event_tiket.id', '=', 'transaksi.id_eventtiket')
        // ->where('transaksi.id',$id)
        // ->select('event_tiket.*','transaksi.*')
        // ->first();

        $data_transaksi = Transaksi::where('id', $id)->first();
        $data_eventtiket=Tiket::find($data_transaksi->id_eventtiket)->first();

        $data_transaksi->bukti_up = $imgName;
        $data_transaksi->save();

        return redirect()->back();
    }

}