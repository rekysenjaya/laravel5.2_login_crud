@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Kartu Pasien</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ URL::to('pasien') }}"> Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-8 col-sm-8">
                        <h2 class="text-primary"><b>Nama: {{ $data->nama }}</b></h2>
                        <p><strong>Alamat: </strong>{{ $data->alamat }} {{ $data->rt }} {{ $data->rw }} {{ $data->nama_kel }} {{ $data->nama_kec }} {{ $data->nama_kota }}</p>
                        <p><strong>Jenis Kelamin: </strong>{{ $data->jenis_kelamin}}</p>
                        <p><strong>ID Pasien: </strong>{{ $data->id}}</p>
                    </div><!--/col-->          
                    <div class="col-xs-5 col-sm-4 text-center">
                        <img src="https://cdn3.iconfinder.com/data/icons/rcons-user-action/32/boy-512.png" alt="profile Pic" class="center-block img-circle img-responsive profile-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection