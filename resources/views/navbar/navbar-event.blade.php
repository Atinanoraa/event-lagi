@extends('layout.dashboard')

@section('title', 'EventLagi | Detail Event')

@section('head')
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">

@endsection

@section('content')
<form action="{{url('tiket-event/save')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="row" style="margin: 80px;">
      <div class="medium-6 columns">
        @if($data_event->foto)
            <img class="thumbnail" src="{{ asset('images/'.$data_event->foto) }}" height="350" width="650">
        @endif

        <h5>Tags :</h5>
          <div class="row small-up-4">
              <p>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              </p>
              <p>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              <button type="button" class="btn btn-secondary btn-sm">#hashtag</button>
              </p>
        </div>
      </div>

      <div class="medium-6 large-5 columns">
        <h2>{{$data_event->nama}}</h2>
        <p>{{$data_event->deskripsi}}</p>
        <h5>Tanggal Dan Waktu</h5>
        <p>{{$data_event->tanggal}}, {{$data_event->waktu_mulai}} - {{$data_event->waktu_selesai}}</p>
        <h5>Lokasi</h5>
        <p>{{$data_event->tempat}}</p>
        <h5>Harga Tiket</h5>
        <div class="d-flex flex-row bd-highlight mb-3">
        @foreach($data_tiket as $tiket)
            <div class="p-2 bd-highlight text-secondary">{{$tiket->jenis}} Rp.{{$tiket->harga}}</div>
            @endforeach
        </div>
        <a  href="{{ url('login-tiket/'.$data_event->id) }}"><button type="button" class="button large expanded btn_style btn_pale" style="background-color: #DC143C;">Registrasi</button></a>
        <div class="small secondary expanded button-group">
            <a href="http://twitter.com/share?source=sharethiscom" class="button" style="background-color:#00acee;">Twitter</a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" class="button" style="background-color:#3b5998;">Facebook</a>
            <a class="button" style="background-color:#FF8C00;">Google</a>
            <a class="button" style="background-color:#25d366;">WhatsApp</a>
        </div>

      </div>
      </div>
    </div>

    <div class="column row">
      <hr>
      <nav>
        <ul class="tabs" data-tabs id="example-tabs" role="tablist">
          <li class="tabs-title"><a href="#panel1" data-toggle="tab" id="panel1-tab" role="tab" aria-controls="panel1" aria-selected="true">Event Lainnya</a></li>
          <li class="tabs-title"><a href="#panel2" data-toggle="tab" id="panel2-tab" role="tab" aria-controls="panel2" aria-selected="false">Event Yang Sama</a></li>
        </ul>
      </nav>
      <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active" id="panel1" role="tabpanel" aria-labelledby="panel1-tab">
          <h4>Event Lainnya</h4>
          <div class="media-object stack-for-small">
            <div class="media-object-section">
              <img class="thumbnail" src="https://1.bp.blogspot.com/-PYkJjRU-mxw/XvhXjBCKVmI/AAAAAAAAItE/V65r2ElykkoPU5RWiVOK9OYWra4n9uKdQCLcBGAsYHQ/s1600/Galaxy%2BTwitch%2BBanner%2B%252849%2529.png" width="250" height="200" >
            </div>
            <div class="media-object-section">
              <h5>Literasi Stematel Reader</h5>
              <p>Literasi adalah kemampuan siswa dalam mengolah dan memahami informasi saat melakukan proses membaca dan menulis. Membantu meningkatkan pengetahuan siswa dengan cara membaca berbagai informasi bermanfaat</p>
              <a href="#">Selengkapnya</a>
            </div>
          </div>
          <div class="media-object stack-for-small">
            <div class="media-object-section">
              <img class="thumbnail" src="https://1.bp.blogspot.com/-qioXr3ElwDo/Xo4g3ebuvsI/AAAAAAAAIJ4/AxPvD_E_i8camcZWB4aFcr0SiTfdPbfvQCLcBGAsYHQ/s1600/webi.png" width="250" height="200">
            </div>
            <div class="media-object-section">
              <h5>Seminar Informasi dan Konseling Remaja</h5>
              <p>Acara ini bertujuan untuk memberikan pelayanan informasi dan konseling tentang perencanaan kehidupan berkeluarga bagi Remaja serta kegiatan-kegiatan penunjang lainnya.</p>
              <a href="#">Selengkapnya</a>
            </div>
          </div>
          <div class="media-object stack-for-small">
            <div class="media-object-section">
              <img class="thumbnail" src="https://1.bp.blogspot.com/-2yJTEw-NI7s/XvhY-jXtcRI/AAAAAAAAItM/anmgt0hNSi8kpUfCR-UEPkbLjv623LTlACLcBGAsYHQ/s1600/webinar.png" width="250" height="200">
            </div>
            <div class="media-object-section">
              <h5>Sosialisasi Remaja Islami</h5>
              <p>Bertujuan untuk mengkaji ”Bagaimana proses sosialisasi agama Islam yang disampaikan melalui media komunitas (elektronik dan cetak) sebagai pembentuk moralitas remaja muslim</p>
              <a href="#">Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="tabs-panel" id="panel2" role="tabpanel" aria-labelledby="panel2-tab">
          <h4>Event Yang Sama</h4>
          <div class="row medium-up-3 large-up-5">
            <div class="column">
              <img class="thumbnail" src="https://lloydkaymedia.com/wp-content/uploads/2019/11/people-using-digital-devices-modern-office_1262-19462.jpg" width="250" height="200">
              <h5>Rapat<small>$22</small></h5>
              <p>Rapat merupakan pertemuan atau berkumpulnya minimal dua orang atau lebih untuk memutuskan suatu tujuan. Rapat juga dapat dijadikan sebagai media untuk berkomunikasi.</p>
              <a href="#" class="button hollow tiny expanded">Beli Sekarang</a>
            </div>
            <div class="column">
              <img class="thumbnail" src="https://lloydkaymedia.com/wp-content/uploads/2019/11/people-using-digital-devices-modern-office_1262-19462.jpg" width="250" height="200">
              <h5>Webinar<small>$22</small></h5>
              <p>Webinar adalah istilah umum dalam dunia kajian yang merujuk kepada kegiatan seminar yang dilakukan secara daring, menggunakan situs web atau aplikasi tertentu berbasis internet.</p>
              <a href="#" class="button hollow tiny expanded">Beli Sekarang</a>
            </div>
            <div class="column">
              <img class="thumbnail" src="https://lloydkaymedia.com/wp-content/uploads/2019/11/people-using-digital-devices-modern-office_1262-19462.jpg" width="250" height="200">
              <h5>Konferensi<small>$22</small></h5>
              <p>Pertemuan untukn bertukar pendapat mengenai suatu masalah yang dihadapi bersama. Konferensi bisnis, pertemuan untuk membahas bisnis. Konferensi pers, suatu pengumuman untuk pers</p>
              <a href="#" class="button hollow tiny expanded">Beli Sekarang</a>
            </div>
            <div class="column">
              <img class="thumbnail" src="https://lloydkaymedia.com/wp-content/uploads/2019/11/people-using-digital-devices-modern-office_1262-19462.jpg" width="250" height="200">
              <h5>Perundingan<small>$22</small></h5>
              <p>Perundingan adalah pembicaraan tentang sesuatu, perembukan, permusyarawaratan. Perundingan merupakan tindakan atau proses menawar untuk meraih tujuan.</p>
              <a href="#" class="button hollow tiny expanded">Beli Sekarang</a>
            </div>
            <div class="column">
              <img class="thumbnail" src="https://lloydkaymedia.com/wp-content/uploads/2019/11/people-using-digital-devices-modern-office_1262-19462.jpg" width="250" height="200">
              <h5>Kongres<small>$22</small></h5>
              <p>Kongres adalah pertemuan besar para wakil organisasi atau pihak-pihak yang memiliki kepentingan untuk mendiskusikan dan mengambil keputusan yang dapat diterima oleh masing-masing individu</p>
              <a href="#" class="button hollow tiny expanded">Beli Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    </div>

    @stop



