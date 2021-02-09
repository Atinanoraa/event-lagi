@extends('layout.user')

@section('title', 'Profile-Transaksi')

@section('content')
<div class="row">
<!-- Column -->
<div class="col-lg-12 col-xlg-9 col-md-7">
    <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="card" href="#home" data-target="#home" role="tab">History Transaksi</a>
            </li>
            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="card" href="#settings" data-target="#settings" role="tab">Settings</a>
            </li> -->
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel">
                @foreach($data_eventtiket as $row)
                <div class="card-body">
                    <div class="sl-item">
                        <div class="card text-dark bg-light mb-3" style="max-width: 100rem;">
                            <div class="card-body" id="home">
                                <form action="/uploadbukti/{{$row->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h3 class="card-title">{{$row->nama}}</h3>
                                    <div>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td style="width: 15rem;">Harga</td>
                                                <td>{{$row->harga}}</td>
                                            </tr>
                                            <tr>
                                                <td>Discount</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>{{$row->total}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    @if($row->bukti_up=="")
                                        <div class="button-wrapper"><br>
                                            <input type="file" name="bukti_up" id="inputGroupFile01" pleacholder="Upload Bukti Pembayaran">
                                            <button type="submit" class="btn btn-info">Submit Bukti Pembayaran</button>
                                        </div>
                                    @else($row->bukti_tp!="")
                                        <h3 class="text-secondary" align="center">Transaksi Berhasil</h3>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        <!--second tab-->

            <div class="tab-pane" id="settings" role="tabpanel">
                <div class="card-body" id="settings">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line pl-0">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line pl-0" name="example-email" id="example-email">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" value="password" class="form-control form-control-line pl-0">
                                </div>
                        </div>
                        <div class="form-group">
                        <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line pl-0">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Message</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line pl-0"></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Select Country</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line pl-0">
                                        <option>London</option>
                                        <option>India</option>
                                        <option>Usa</option>
                                        <option>Canada</option>
                                        <option>Thailand</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
