@extends('layout.layout')

@section('title', 'Daftar Events')

@section('button')
<a href="/admin/event/create" class="btn btn-lg btn-primary" tabindex="-1" role="button"><b style="color: white;">Tambah Event</b></a>
<!-- <a href="penyelenggara/create" class="btn btn-danger d-none d-md-inline-block text-white">Registrasi Penyelenggara</a> -->
@stop

@section('content')

<style>
.breadcrumbs{padding:10px 20px;font-family: 'Roboto', sans-serif;font-size:11px;color:#333;background:#f8f8f8;border-radius:3px 3px 0 0;box-shadow: 1px 3px 5px 0 rgba(0,0,0,0.1);}
.breadcrumbs a{color:#333}
#bread-crumbs {overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
.postmeta{color:#eee;}
.postmeta .post_meta{margin-left:47px}
.postmeta .imageurlpost{position:absolute;}
.postmeta .imageurlpost amp-img{border-radius:50%; bottom:10px;border:3px solid #56cffe;transition: all .3s}
.postmeta .imageurlpost amp-img:hover{transition: all .3s;transform: rotate(720deg)}
.postmeta a{color:#fff;padding:5px 10px 5px 10px;margin-right:5px;font-family:'Roboto', sans-serif;font-size:12px;font-weight:400}
.postmeta .fn a{background:rgba(255, 105, 105, 0.68);border-radius: 3px;}
.postmeta .clock a{background:rgba(105, 158, 255, 0.69);border-radius: 3px;}
.post-labels {font-family:'Roboto', sans-serif;display: block;margin: 40px 5px 20px;}
.post-labels a {padding: 3px 5px;border-radius: 5px;margin-right: 7px;color: #fff;font-size: 12px;}
.post-labels a:nth-child(1){background:#ff9244;margin-left: -5px;}
.post-labels a:nth-child(2){background:#25d366;margin-left: -5px;}
.post-labels a:nth-child(3){background:#448aff;margin-left: -5px;}
.post-labels a:nth-child(4){background:#d325be;margin-left: -5px;}
.post-labels a:nth-child(n+5){display:none}
.post .info {background: #fafafa;position:relative;padding: 10px;border-left: 5px solid #3572b1;margin-bottom: 10px;padding-left: 55px;}
.post .info:before {content: "\f06a";color: #00bf8f;position: absolute;left: 10px;font-family: fontawesome;font-size: 40px;top: -15px;}
</style>

@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<a href="/admin/event"><button type="button" class="close" data-dismiss="alert">×</button></a>
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
                            <th>Penyelenggara</th>
                            <th>Jenis Event</th>
                            <th>Foto</th>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Link</th>
                            <th>Kuota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data_event as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->jenis_event}}</td>
                            <td> <img width="120px" src="/images/{{$row->foto}}" alt="image"></td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->tanggal}}</td>
                            <td>{{$row->tempat}}</td>
                            <td>{{$row->waktu_mulai}}</td>
                            <td>{{$row->waktu_selesai}}</td>
                            <td>{{$row->deskripsi}}</td>
                            <td>{{$row->status}}</td>
                            <td>{{$row->link}}</td>
                            <td>{{$row->kuota}}</td>
                            <td>
                                <a href="/admin/event/edit/{{$row->id}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/admin/event/delete/{{$row->id}}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    <b:if cond='data:blog.pageType == &quot;item&quot;'>

<div class='post-footer'>

 <span class='post-labels'>

           <b:if cond='data:post.labels'>

              <b:loop values='data:post.labels' var='label'>

                <a expr:href='data:label.url + &quot;?max-results=6&quot;' expr:title='data:label.name' rel='tag nofollow'>#<data:label.name/>ha</a><b:if cond='data:label.isLast != &quot;true&quot;'/>

              </b:loop>

           </b:if>

       </span>

<div class='clear'/>
</script>
@stop
