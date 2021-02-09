@extends('layout.layout')

@section('title', 'Daftar Transaksi')

@section('button')
<a href="/admin/transaksi/create" class="btn btn-lg btn-primary" tabindex="-1" role="button"><b style="color: white;">Tambah Transaksi</b></a>
<!-- <a href="penyelenggara/create" class="btn btn-danger d-none d-md-inline-block text-white">Registrasi Penyelenggara</a> -->
@stop

@section('content')

@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<a href="/admin/transaksi"><button type="button" class="close" data-dismiss="alert">×</button></a>
	<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('gagal'))
	<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
	</div>
@endif
<div class="row">
<div class="col-md-12 col-lg-12 col-sm-12">
<div class="white-box">
<div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tiket</th>
                            <th>Peserta</th>
                            <th>Status</th>
                            <th>Bukti</th>
                            <th>Waktu</th>
                            <th>QR Code</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data_transaksi as $row)
                        <tr>
                            <td>{{$row->id_eventtiket}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->status}}</td>
                            <td><img width="120px" src="/images/{{$row->bukti_up}}" alt="image"></td>
                            <td>{{$row->waktu}}</td>
                            <td>{{$row->qr_code}}</td>
                            <td>
                                <a href="transaksi/edit/{{$row->id}}" class="btn btn-warning btn-sm">Edit Data</a>
                                <a href="transaksi/delete/{{$row->id}}" class="btn btn-danger btn-sm">Remove Data</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop


