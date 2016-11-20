@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data Kelurahan</h2>
        </div>
        <div class="pull-right">
            @if ($role == 'admin')
            <a class="btn btn-success" href="{{ URL::to('kelurahan/create') }}"> Tambah Data Kelurahan</a>
            @endif
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No </th>
        <th>Nama Kelurahan</th>
        <th>Nama Kecamatan</th>
        <th>Nama Kota</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($datas as $key => $data)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $data->nama_kel }}</td>
        <td>{{ $data->nama_kec }}</td>
        <td>{{ $data->nama_kota }}</td>
        <td>
            @if ($role == 'admin')
            <a class="btn btn-info" href="{{ URL::to('kelurahan/' . $data->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ URL::to('kelurahan/' . $data->id.'/edit') }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','url' => ['kelurahan/'. $data->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger','onclick' => "return confirm('anda yakin untuk menghapus data ini')"]) !!}
            {!! Form::close() !!}
            @endif
        </td>
    </tr>
    @endforeach
</table>
{!! $datas->render() !!}
@endsection