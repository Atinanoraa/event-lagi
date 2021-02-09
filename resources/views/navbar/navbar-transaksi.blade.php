@extends('layout.dashboard')

@section('title', 'EventLagi | Transaksi')

@section('head')
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
@endsection

@section('content')

@foreach($data_eventtiket as $row)
<!-- Pricing -->
<div id="pricing">
        <div class="container">
            <div class="row" style="margin:100px 0px;">
                <div class="col-lg-12">
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{$row->nama}}</h3>
                            <h5 class="card-title">Tiket {{$row->jenis}}</h5>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="text-secondary">Tempat</span><br>
                                <span class="currency">{{$row->tempat}}</span><br><br>
                                <span class="text-secondary">Waktu</span><br>
                                <span class="currency">{{$row->waktu_mulai}} - {{$row->waktu_selesai}} WIB</span>
                            </div>
                            <hr class="cell-divide-hr">
                            <div class="row">
                                <div class="medium-6 columns">
                                <span class="text-secondary">Informasi Pemesan</span><br>
                                <span class="currency">Dipesan oleh : {{$row->name}} pada {{$row->created_at}}</span><br>
                                </div>
                                <div class="medium-6 large-6 columns">
                                    <img class="float-right"  src="https://2d6qxj3uqdaw38d6lk27l0ao-wpengine.netdna-ssl.com/wp-content/uploads/2015/10/apb-qr-code.png" alt="barcode.img" width="150" hight="150">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <div class="button-wrapper"><br>
                        <a href="/users/{{$row->user_id}}" class="btn-solid-reg page-scroll float-right" style="padding:20px 80px;">Pembayaran</a>
                    </div>
                </div> <!-- end of col -->
                @endforeach
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->

@stop



