@extends('layouts.master')

@section('content')
    <h2 class="col-md-12">Candidate Registration</h2>
    <div class="col-md-12">
        <div class="pull-right"><span class="btn btn-info"><a href="/recruiter/signup">Recruiter Signup</a></span></div>
    </div>

    @include('includes.inputErrors')

    <div class="col-md-6 col-md-offset-3 margin-top-sm box-shadow">

        {!! BootForm::open()->action('/inscription')->class('col-md-8') !!}
        {!! BootForm::text('First name', 'firstname') !!}
        {!! BootForm::text('Surname', 'lastname') !!}
        {!! BootForm::email('Email', 'email') !!}
        {!! BootForm::password('Password', 'password') !!}
        {!! BootForm::password('Password Confirmation', 'password_confirmation') !!}

        {!! BootForm::submit('Submit')->class('btn btn-success jobs-submit') !!}

        {!! BootForm::close() !!}
    </div>


@endsection
