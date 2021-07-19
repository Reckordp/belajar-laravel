@extends('layout')

@section('content')
<div class="container border py-3 px-5">
	<div class="row">
		<div class="border col-md-4 fw-bold">Nama</div>
		<div class="border col-md-8">{{ $proj->nama }}</div>
	</div>
	<div class="row">
		<div class="border col-md-4 fw-bold">Waktu Rilis</div>
		<div class="border col-md-8">{{ $proj->deadline }}</div>
	</div>
	<div class="row">
		<div class="border col-md-4 fw-bold">Deskripsi</div>
		<div class="border col-md-8">{{ $proj->deskripsi }}</div>
	</div>
</div>
<a class="btn btn-primary m-3" href="/" role="button">kembali</a>
@stop