@extends('layout')

@section('content')

<div class="my-5" align="center">
	<div class="col-md-6">
		<form class="form-control" method="post">
			{{ csrf_field() }}
			<div class="row">
				<h3 class="fw-bold p-3">Masuk</h3>
				@if($errors->any())
					<div class="row-cols-1 mt-2 input-group">
						<div class="alert alert-warning">
							<p class="">{{ $errors->first() }}</p>
						</div>
					</div>
				@endif
				<div class="row-cols-1 mt-2 input-group">
					<p>Email</p>
					<input class="form-control" type="email" placeholder="Enter Email" name="email" required autocomplete="email" autofocus />
				</div>
				<div class="row-cols-1 input-group">
					<p>Password</p>
					<input class="form-control" type="password" placeholder="Enter Password" name="pass" required />
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