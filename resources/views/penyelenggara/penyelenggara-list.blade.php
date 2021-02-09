@extends('layout.layout')

@section('title', 'Daftar Penyelenggara')

@section('button')
<a href="/admin/penyelenggara/create" class="btn btn-lg btn-primary" tabindex="-1" role="button"><b style="color: white;">Registrasi Penyelenggara</b></a>
<!-- <a href="penyelenggara/create" class="btn btn-danger d-none d-md-inline-block text-white">Registrasi Penyelenggara</a> -->
@stop

@section('content')

@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<a href="/admin/penyelenggara"><button type="button" class="close" data-dismiss="alert">×</button></a>
	<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('gagal'))
	<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
	</div>
@endif

@foreach($data_penyelenggara as $row)
<div class="card">
  <div class="card-header">
    Form Event
  </div>
  <div class="card-body">
    <h2 class="card-title">Data Penyelenggara</h2>
    <h6 class="card-text">Nama    :   {{$row->name}}</h6><br>
    <h6 class="card-text">Email   :   {{$row->email}}</h6><br>
    <h6 class="card-text">No HP   :   {{$row->no_hp}}</h6><br>
    <h6 class="card-text">KTP     :   {{$row->ktp}}</h6><br>
    <a href="/admin/event/create" class="btn btn-primary">Create Event</a>
    <a href="/admin/penyelenggara/edit/{{$row->id}}" class="btn btn-warning">Edit Data</a>
    <a href="/admin/penyelenggara/delete/{{$row->id}}" class="btn btn-danger">Remove Data</a>
  </div>
</div>
@endforeach
@stop
