@extends('layout.layout')

@section('name', 'Edit Data Tiket')

@section('title', 'Edit Kategori Tiket')

@section('content')

			<form action="/admin/tiket/update/{{$data_tiket->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Jenis</label><br>
                    <!-- <input type="text" name="jenis" class="form-control" value="{{$data_tiket->jenis}}"><br> -->
                    <select name="jenis" class="form-control">
                        <option value="Silver" @if($data_tiket->jenis=='Silver') selected @endif>Silver</option>
                        <option value="Gold" @if($data_tiket->jenis=='Gold') selected @endif>Gold</option>
                        <option value="Diamond" @if($data_tiket->jenis=='Diamond') selected @endif>Diamond</option>
                    </select><br>
                </p>
                <p>
                    <label>Harga</label><br>
                    <input type="text" name="harga" class="form-control" value="{{$data_tiket->harga}}"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Edit" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
