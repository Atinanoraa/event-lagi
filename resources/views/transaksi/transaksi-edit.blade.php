@extends('layout.layout')

@section('name', 'Edit Data Transaksi')

@section('title', 'Edit Transaksi')

@section('content')

            <form action="/admin/transaksi/update/{{$data_transaksi->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Tiket</label>
                    <input type="text" name="id_eventtiket" class="form-control" value="{{$data_transaksi->id_eventtiket}}"><br>
                </p>
                <p>
                    <label>Peserta</label><br>
                    <select name="nama" id="nama" class="form-control">
                    @foreach($data_peserta as $row)
                        <option value="{{$row->id}}" selected >{{$row->nama}}</option>
                    @endforeach
                    </select>
                </p>
                <p>
                    <label>Status</label><br>
                    <select name="status" class="form-control">
                        <option value="Online" @if($data_transaksi->status=='Online') selected @endif>Online</option>
                        <option value="Offline" @if($data_transaksi->status=='Offline') selected @endif>Offline</option>
                    </select><br>
                </p>
                <p>
                    <label>Bukti Up</label><br>
                    @if($data_transaksi->bukti_up)
                        <img id="bukti_up" src="{{ asset('images/'.$data_transaksi->bukti_up) }}" height="70" width="70">
                    @endif
                        <input type="file" name="bukti_up" class="form-control" placeholder=""  value="{{ $data_transaksi->bukti_up }}">
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                </p>
                <p>
                    <label>Waktu</label><br>
                    <input type="time" name="waktu" class="form-control" value="{{$data_transaksi->waktu}}"><br>
                </p>
                <p>
                    <label>QR Code</label><br>
                    <input type="text" name="qr_code" class="form-control" value="{{$data_transaksi->qr_code}}"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Edit" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
