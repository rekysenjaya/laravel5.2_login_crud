@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Data Kelurahan</h2>
           </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ URL::to('kelurahan') }}"> Kembali</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kelurahan:</strong>
                {{ $data->nama_kel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kecamatan:</strong>
                {{ $data->nama_kec }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kota:</strong>
                {{ $data->nama_kota }}
            </div>
        </div>
    </div>
@endsection