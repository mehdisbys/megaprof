@extends('layouts.master')

@section('login-button')
@stop

@section('content')

@include('includes.inputErrors')

<div class="wrapper">
	<div class="connection-form">
		<h1 class="register-step-title">@lang('auth/password.reinitialize')</h1>
		<form id="loginForm" role="form" method="POST" action="/reset_password" class="component-form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}"/>

			<div class="form-wrapper">

				<div class="input-text input-container">
					<input type="text" data-type="email" placeholder=@lang('auth/password.email) required="" name="email" class="input"/>
				</div>

				<input type="submit" value=@lang('auth/password.reinitializeButton') class="button topmargin-sm"/>
			</div>
		</form>
	</div>
</div>
@endsection
