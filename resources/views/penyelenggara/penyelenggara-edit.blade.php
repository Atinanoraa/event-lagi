@extends('layout.layout')
@section('name', 'Edit Data Penyelenggara')
@section('content')

			<form action="/admin/penyelenggara/update/{{$data_penyelenggara->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Nama</label><br>
                    <input type="text" name="name" class="form-control" value="{{$data_penyelenggara->name}}"><br>
                </p>
                <p>
                    <label>Email</label><br>
                    <input type="email" name="email" class="form-control" value="{{$data_penyelenggara->email}}"><br>
                </p>
                <p>
                    <label>No HP</label><br>
                    <input type="text" name="no_hp" class="form-control" value="{{$data_penyelenggara->no_hp}}"><br>
                </p>
                <p>
                    <label>KTP</label><br>
                    <input type="text" name="ktp" class="form-control" value="{{$data_penyelenggara->ktp}}"><br>
                </p>
                <p>
                    <label>Password</label><br>
                    <input type="password" name="password" class="form-control" value="{{$data_penyelenggara->password}}"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Edit" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
