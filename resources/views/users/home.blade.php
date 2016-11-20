@extends('layouts.master')

@section('content')

	<h3>Halaman depan user {{\Auth::user()->name}}  </h3>
        {{$email}}

@endsection
