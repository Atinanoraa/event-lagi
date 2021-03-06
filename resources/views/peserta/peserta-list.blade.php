@extends('layout.layout')

@section('title', 'Daftar Peserta')

@section('button')
<a href="/admin/peserta/create" class="btn btn-lg btn-primary" tabindex="-1" role="button"><b style="color: white;">Registrasi Peserta</b></a>
<!-- <a href="penyelenggara/create" class="btn btn-danger d-none d-md-inline-block text-white">Registrasi Penyelenggara</a> -->
@stop

@section('content')

@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<a href="/admin/peserta"><button type="button" class="close" data-dismiss="alert">×</button></a>
	<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('gagal'))
	<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
	</div>
@endif

@foreach($data_peserta as $row)
<div class="card">
  <div class="card-header">
    Form Peserta
  </div>
  <div class="card-body">
    <h2 class="card-title">Data Peserta</h2>
    <h6 class="card-text">Nama    :   {{$row->nama}}</h6><br>
    <h6 class="card-text">Email   :   {{$row->email}}</h6><br>
    <h6 class="card-text">No HP   :   {{$row->no_hp}}</h6><br>
    <h6 class="card-text">KTP     :   {{$row->ktp}}</h6><br>
    <a href="/admin/peserta/edit/{{$row->id}}" class="btn btn-warning">Edit Data</a>
    <a href="/admin/peserta/delete/{{$row->id}}" class="btn btn-danger">Remove Data</a>
  </div>
</div>
@endforeach
@stop
