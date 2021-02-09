@extends('layout.layout')

@section('name', 'Create Event')

@section('title', 'Create Events')

@section('content')

			<form action="{{url('admin/event/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Penyelenggara</label><br>
                    <select name="penyelenggara" id="penyelenggara" class="form-control">
                        <option value=""></option>
                    @foreach($data_penyelenggara as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                    </select>
                </p>
                <p>
                    <label>Jenis Event</label><br>
                    <input type="text" name="jenis_event" class="form-control"><br>
                </p>
                <p>
                    <label>Foto</label><br>
                    <input type="file" name="foto"><br><br>
                </p>
                <p>
                    <label>Nama Event</label><br>
                    <input type="text" name="nama" class="form-control"><br>
                </p>
                <p>
                    <label>Tanggal</label><br>
                    <input type="date" name="tanggal" class="form-control"><br>
                </p>
                <p>
                    <label>Tempat</label><br>
                    <input type="text" name="tempat" class="form-control"><br>
                </p>
                <p>
                    <label>Waktu Mulai</label><br>
                    <input type="time" name="waktu_mulai" class="form-control"><br>
                </p>
                <p>
                    <label>Waktu Selesai</label><br>
                    <input type="time" name="waktu_selesai" class="form-control"><br>
                </p>
                <p>
                    <label>Deskripsi</label><br>
                    <input type="text" name="deskripsi" class="form-control"><br>
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
                    <label>Link</label><br>
                    <input type="text" name="link" class="form-control"><br>
                </p>
                <p>
                    <label>Kuota</label><br>
                    <input type="text" name="kuota" class="form-control"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Simpan" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
