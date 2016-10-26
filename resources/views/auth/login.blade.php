@extends('layouts.master')
@section('login-button')
@stop

@section('content')
  @include('includes.inputErrors')
  @include("auth.loginForm")
@endsection
