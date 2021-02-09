@extends('layout.layout')

@section('name', 'Tambah Tiket')

@section('title', 'Create Kategori Ticket')

@section('content')

			<form action="{{url('admin/tiket/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Event</label><br>
                    <select name="id_event" id="id_event" class="form-control">
                        @foreach($data_event as $row)
                            <option value="{{$row->id}}"  selected >{{$row->nama}}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>Jenis</label><br>
                    <!-- <input type="text" name="tiket" class="form-control"><br> -->
                    <select name="jenis" value="jenis" class="form-control">
                        <option value="" disable></option>
                        <option value="Silver">Silver</option>
                        <option value="Gold">Gold</option>
                        <option value="Diamond">Diamond</option>
                    </select>
                </p>
                <p>
                    <label>Harga</label><br>
                    <input type="text" name="harga" class="form-control"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Simpan" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
