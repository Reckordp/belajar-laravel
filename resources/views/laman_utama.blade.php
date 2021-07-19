@extends('layout')

@section('content')
<div align="right">
	<a class="btn btn-primary m-3" href="/login" role="button">Login</a>
</div>
<ul>
	@foreach($d_project as $project)
		<li>
			<a href="/produk/{{ $project->id }}">{{ $project->nama }}</a>
		</li>
	@endforeach
</ul>
@stop