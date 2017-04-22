@extends('layouts.master')

@section('title')
    <title>Se connecter sur mon compte et donner des cours ou chercher un professeur particulier | Taelam </title>
@endsection()

@section('meta_description')
    <meta name="Description" lang="fr"
          content="Se connecter à mon compte | Taelam"/>
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
