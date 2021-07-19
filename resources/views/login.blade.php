@extends('layout')

@section('content')

<div class="my-5" align="center">
	<div class="col-md-6">
		<form class="form-control input-group-text" method="post">
			{{ csrf_field() }}
			<div class="row">
				<h3 class="fw-bold p-3">Masuk</h3>
				<div class="row-cols-1">
					<input class="p-1 mb-2" type="text" placeholder="Username" name="user" />
				</div>
				<div class="row-cols-1">
					<input class="p-1 mb-2" type="password" placeholder="Password" name="pass" />
				</div>
				<div class="col-md-12">
					<input class="btn btn-primary mt-4 m-3" type="submit" value="Login"></input>
				</div>
			</div>
		</form>
	</div>
</div>
<a class="btn btn-primary m-3" href="/" role="button">kembali</a>

@stop