@extends('layouts.master')

@section('title')
    <title>@lang('auth.login.title')</title>
@endsection()

@section('meta_description')
    <meta name="Description" lang="fr"
          content=@lang('auth.login.meta')/>
@endsection

@section('custom-head')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('login-button')
@stop

@section('content')
    @include('includes.inputErrors')
    @include("auth.loginForm")
@endsection
