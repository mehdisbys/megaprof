@extends('layouts.master')

@section('login-button')
@stop

@section('content')
    @include('includes.inputErrors')

    <div class="wrapper">
        <div class="connection-form">
            <h1 class="register-step-title">@lang("reset.reinitializePassword")</h1>
            <form id="loginForm" role="form" method="POST" action="/reset/try" class="component-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="form-wrapper">

                    <div class="input-text input-container">
                        <input type="password" data-type="email" placeholder=@lang("reset.password") required="" name="password"
                               class="input"/>
                    </div>

                    <div class="input-text input-container">
                        <input type="password" data-type="required" required="" placeholder=@lang('reset.confirmPassword')
                               name="password_confirmation"
                               class="input" value=""/>
                    </div>

                    <input type="submit" value=@lang('reset.reinitButton') class="button topmargin-sm"/>

                </div>
            </form>
        </div>
    </div>
@endsection
