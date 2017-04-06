@extends('layouts.master')

@section('custom-head')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('login-button')
@stop

@section('content')
    @include('includes.inputErrors')
    @include("auth.loginForm")
@endsection
