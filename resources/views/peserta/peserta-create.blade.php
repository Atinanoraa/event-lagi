@extends('layout.layout')

@section('name', 'Tambah Peserta')

@section('title', 'Create Peserta')

@section('content')

			<form action="{{url('admin/peserta/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Nama</label><br>
                    <input type="text" name="nama" class="form-control"><br>
                </p>
                <p>
                    <label>Email</label><br>
                    <input type="text" name="email" class="form-control"><br>
                </p>
                <p>
                    <label>No Hp</label><br>
                    <input type="text" name="no_hp" class="form-control"><br>
                </p>
                <p>
                    <label>KTP</label><br>
                    <input type="text" name="ktp" class="form-control"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Simpan" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
