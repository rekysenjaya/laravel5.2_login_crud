@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Kelurahan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ URL::to('kelurahan') }}"> Kembali</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> form harus diisi semua.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($data, ['method' => 'PATCH','url' => ['kelurahan', $data->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kelurahan:</strong>
                {!! Form::text('nama_kel', null, array('placeholder' => 'Nama Kelurahan','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kecamatan:</strong>
                {!! Form::text('nama_kec', null, array('placeholder' => 'Nama Kecamatan','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kota:</strong>
                {!! Form::text('nama_kota', null, array('placeholder' => 'Nama Kota','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection