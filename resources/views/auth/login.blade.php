@extends('layouts.master')

@section('login-button')
@stop

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						@include('includes.success')
						@include('includes.error')
						@include('includes.inputErrors')

						@include("auth.loginForm")
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
