@extends('layouts.__master')

@section('content')
    <h2 class="col-md-12">Inscription sur Mégaprof</h2>


    @include('includes.inputErrors')

    <div class="col-md-6 col-md-offset-3 margin-top-sm box-shadow">

        {!! BootForm::open()->action('/inscription')->class('col-md-8') !!}
        {!! BootForm::text('Prénom', 'firstname') !!}
        {!! BootForm::text('Nom', 'lastname') !!}
        {!! BootForm::email('Email', 'email') !!}
        {!! BootForm::password('Mot de passe', 'password') !!}
        {!! BootForm::password('Confirmation du mot de passe', 'password_confirmation') !!}

        {!! BootForm::submit('Submit')->class('btn btn-success jobs-submit') !!}

        {!! BootForm::close() !!}
    </div>


@endsection
