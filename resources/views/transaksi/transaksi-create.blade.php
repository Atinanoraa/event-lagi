@extends('layout.layout')

@section('name', 'Tambah Transaksi')

@section('title', 'Create Transaksi')

@section('content')

			<form action="{{url('admin/transaksi/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Tiket</label><br>
                    <input type="text" name="tiket" class="form-control"><br>
                </p>
                <p>
                    <label>Peserta</label><br>
                    <select name="peserta" id="peserta" class="form-control">
                    @foreach($data_peserta as $row)
                        <option value="{{$row->id}}"  selected >{{$row->nama}}</option>
                    @endforeach
                    </select>
                </p>
                <p>
                    <label>Status</label><br>
                    <select name="status" class="form-control">
                        <option value="-"></option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                    </select><br>
                </p>
                <p>
                    <label>Bukti</label><br>
                    <input type="file" name="bukti_up"><br><br>
                </p>
                <p>
                    <label>QR Code</label><br>
                    <input type="text" name="qr_code" class="form-control"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Simpan" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
