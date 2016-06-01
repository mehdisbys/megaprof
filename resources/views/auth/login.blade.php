@extends('layouts.master')
@section('login-button')
@stop

@section('content')
  @include('includes.success')
  @include('includes.error')
  @include('includes.inputErrors')
  @include("auth.loginForm")
@endsection
