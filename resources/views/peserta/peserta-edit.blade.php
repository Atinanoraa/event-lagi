@extends('layout.layout')

@section('name', 'Edit Data Peserta')

@section('title', 'Edit Peserta')

@section('content')

			<form action="/admin/peserta/update/{{$data_peserta->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Nama</label><br>
                    <input type="text" name="nama" class="form-control" value="{{$data_peserta->nama}}"><br>
                </p>
                <p>
                    <label>Email</label><br>
                    <input type="text" name="email" class="form-control" value="{{$data_peserta->email}}"><br>
                </p>
                <p>
                    <label>No HP</label><br>
                    <input type="text" name="no_hp" class="form-control" value="{{$data_peserta->no_hp}}"><br>
                </p>
                <p>
                    <label>KTP</label><br>
                    <input type="text" name="ktp" class="form-control" value="{{$data_peserta->ktp}}"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Edit" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
