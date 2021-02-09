@extends('layout.layout')

@section('name', 'Edit Data Event')

@section('title', 'Edit Events')

@section('content')

			<form action="/admin/event/update/{{$data_event->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Penyelenggara</label>
                    <input type="text" name="penyelenggara" class="form-control" value="{{$data_penyelenggara->name}}"  disabled>

                </p>
                <p>
                    <label>Jenis Event</label><br>
                    <input type="text" name="jenis_event" class="form-control" value="{{$data_event->jenis_event}}"><br>
                </p>
                <p>
                    <label>Foto</label><br>
                    @if($data_event->foto)
                        <img id="foto" src="{{ asset('images/'.$data_event->foto) }}" height="70">
                    @endif
                        <br><br>
                        <input type="file" name="foto" placeholder=""  value="{{ $data_event->foto }}">
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                </p><br>
                <p>
                    <label>Nama</label><br>
                    <input type="text" name="nama" class="form-control" value="{{$data_event->nama}}"><br>
                </p>
                <p>
                    <label>Tanggal</label><br>
                    <input type="date" name="tanggal" class="form-control" value="{{$data_event->tanggal}}"><br>
                </p>
                <p>
                    <label>Tempat </label><br>
                    <input type="text" name="tempat" class="form-control" value="{{$data_event->tempat}}"><br>
                </p>
                <p>
                    <label>Waktu Mulai</label><br>
                    <input type="time" name="waktu_mulai" class="form-control" value="{{$data_event->waktu_mulai}}"><br>
                </p>
                <p>
                    <label>Waktu Selesai</label><br>
                    <input type="time" name="waktu_selesai" class="form-control" value="{{$data_event->waktu_selesai}}"><br>
                </p>
                <p>
                    <label>Deskripsi</label><br>
                    <input type="text" name="deskripsi" class="form-control" value="{{$data_event->deskripsi}}"><br>
                </p>
                <p>
                    <label>Status</label><br>
                    <select name="status" class="form-control">
                        <option value="Online" @if($data_event->status=='Online') selected @endif>Online</option>
                        <option value="Offline" @if($data_event->status=='Offline') selected @endif>Offline</option>
                    </select><br>
                </p>
                <p>
                    <label>Link</label><br>
                    <input type="text" name="link" class="form-control" value="{{$data_event->link}}"><br>
                </p>
                <p>
                    <label>Kuota</label><br>
                    <input type="text" name="kuota" class="form-control" value="{{$data_event->kuota}}"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Edit" class="btn btn-primary">
                </p>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@stop
