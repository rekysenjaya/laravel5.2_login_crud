@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data Pasien</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ URL::to('pasien/create') }}"> Tambah Data Pasien</a>
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
        <th>Nama Pasien</th>
        <th>Alamat Lengkap</th>
        <th>Jenis Kelamin</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($datas as $key => $data)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->alamat }} {{ $data->rt }} {{ $data->rw }} {{ $data->nama_kel }} {{ $data->nama_kec }} {{ $data->nama_kota }}</td>
        <td>{{ $data->jenis_kelamin }}</td>
        <td>
            <a class="btn btn-info" data-link-id='{{ $data->id}}' href="{{ URL::to('pasien/' . $data->id) }}">Card</a>
            <a class="btn btn-primary" href="{{ URL::to('pasien/' . $data->id.'/edit') }}">Edit</a>

            @if ($role == 'admin')
            {!! Form::open(['method' => 'DELETE','url' => ['pasien/'. $data->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger','onclick' => "return confirm('anda yakin untuk menghapus data ini')"]) !!}
            {!! Form::close() !!}
            @endif
        </td>
    </tr>
    @endforeach
</table>
{!! $datas->render() !!}
@endsection