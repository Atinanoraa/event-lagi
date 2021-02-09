@extends('layout.user')

@section('title', 'Profile')

@section('content')
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="m-t-30"> <label for="photo"><img src={{ asset('images/'.$data_user->photo) }} alt="Profile Photo"
                                    class="rounded-circle hover-shadow" width="150" height="150" style="object-fit: cover;" /></label>
                                    <h4 class="card-title m-t-10">{{$data_user->name}}</h4>
                                    <h6 class="card-subtitle">{{$data_user->email}}</h6>
                                    <div class="row text-center justify-content-center">
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                                <i class="icon-people" aria-hidden="true"></i>
                                                <span class="value-digit">254</span>
                                            </a></div>
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                                <i class="icon-picture" aria-hidden="true"></i>
                                                <span class="value-digit">54</span>
                                            </a></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p>Sementara</p>
                                <form action="/users/update-profile/{{$data_user->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label>Masukin foto profile</label><br>
                                    <label for="photo">
                                        <a class="btn btn-primary hover-shadow">Ganti Profile</a>
                                    </label>
                                    <input type="file" accept="image/*" name="photo" id="photo" style="opacity: 0; position: absolute; width: 0; height: 0;"><br>
                                    <input type="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Setting Profile</a></li>
                                </ul>

                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">

                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Nama Lengkap</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{$data_user->name}}" class="form-control form-control-line pl-0">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="{{$data_user->email}}" class="form-control form-control-line pl-0" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" placeholder="password" class="form-control form-control-line pl-0">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">No HP</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="no hp" class="form-control form-control-line pl-0">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Pesan</label>
                                                <div class="col-md-12">
                                                    <textarea rows="3" placeholder="masukkan pesan" class="form-control form-control-line pl-0"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Pilih Negara</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line pl-0">
                                                    <option>Indonesia</option>
                                                        <option>Filipina</option>
                                                        <option>Malaysia</option>
                                                        <option>Vietnam</option>
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
                </div>
@stop
