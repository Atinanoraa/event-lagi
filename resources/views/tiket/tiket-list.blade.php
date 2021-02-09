@extends('layout.layout')

@section('title', 'Daftar Kategori Tiket')

@section('button')
<a href="/admin/tiket/create" class="btn btn-lg btn-primary" tabindex="-1" role="button"><b style="color: white;">Tambah Tiket</b></a>
<!-- <a href="penyelenggara/create" class="btn btn-danger d-none d-md-inline-block text-white">Registrasi Penyelenggara</a> -->
@stop

@section('content')

@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<a href="/admin/tiket"><button type="button" class="close" data-dismiss="alert">×</button></a>
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
                            <th>Event</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data_tiket as $row)
                        <tr>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->jenis}}</td>
                            <td>{{$row->harga}}</td>
                            <td>
                                <a href="/admin/tiket/edit/{{$row->id}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/admin/tiket/delete/{{$row->id}}" class="btn btn-danger btn-sm">Remove</a>
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
