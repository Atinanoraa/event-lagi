@extends('layout.dashboard')

@section('title', 'EventLagi | Registrasi')

@section('head')
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">

@endsection


@section('content')

    <div class="row" style="margin: 80px;">
      <div class="medium-6 columns">
        @if($data_event->foto)
             <img class="thumbnail" src="{{ asset('images/'.$data_event->foto) }}" height="350" width="650">
        @endif

        <div class="ml-2">
            <h2 class="font-weight-bold" style="font-family: Calibri;">{{$data_event->nama}}</h2>
            <p>{{$data_event->deskripsi}}</p>
        </div>
        

        
        </div>

    <div class="medium-6 large-5 columns">
    <form action="{{url('tiket-event/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3 class="font-weight-bold" style="font-family: Calibri;">Form Registrasi</h3>
        <input type="hidden" name="user_id" id="user_id" value="{{$user_data->id}}">
        @foreach($data_tiket as $row)
        <input type="hidden" name="id_event" id="id_event" value="{{$row->id_event}}">
        @endforeach                
                        <div>
                            @foreach($data_tiket as $row)

                            @if ($row->jenis=="Silver")
                                <label for="{{$row->id}}">
                                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                                        <div class="card-header" style="height: 2rem;"></div>
                                        <div class="card-body">
                                            <h5 class="card-title"><b>{{$row->jenis}}</b></h5>
                                            <p class="card-text">Rp {{$row->harga}}</p>
                                        </div>
                                    </div>
                                </label>
                            @endif

                            @if ($row->jenis=="Gold")
                                <label for="{{$row->id}}">
                                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                        <div class="card-header" style="height: 2rem;"></div>
                                        <div class="card-body">
                                            <h5 class="card-title"><b>{{$row->jenis}}</b></h5>
                                            <p class="card-text text-white">Rp {{$row->harga}}</p>
                                        </div>
                                    </div>
                                </label>
                            @endif

                            @if ($row->jenis=="Diamond")
                                <label for="{{$row->id}}">
                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header" style="height: 2rem;"></div>
                                        <div class="card-body">
                                            <h5 class="card-title"><b>{{$row->jenis}}</b></h5>
                                            <p class="card-text text-white">Rp {{$row->harga}}</p>
                                        </div>
                                    </div>
                                </label>
                            @endif
                            
                            <input type="radio" name="id_tiket" id="{{$row->id}}" value="{{$row->id}}"><br>
                            
                            @endforeach

                            
                        </div>
                        <div>
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div>
                            <label for="no">No Telepon</label>
                            <input type="text" id="no" name="no_telp" class="form-control">
                        </div>
                        <div>
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control">
                        </div>
                        <div>
                            <label for="ktp">KTP</label>
                            <input type="text" id="ktp" name="no_ktp" class="form-control">
                        </div>
                        <div>
                        <table class="table table-borderless">
                        <script type="text/javascript">
                        function tiket() {
                            var tes = document.getElementById("id_tiket").value;
                                document.getElementById("harga").value=tes;
                        }
                        </script>
                        <tr>
                            <td>Harga</td>
                            <td><input type="text" id="harga" disabled></td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><input type="text" id="harga" disabled></td>
                        </tr>
                        </table>
                        </div>
                        <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
         </div>
    </div>
    </div>
    @stop



