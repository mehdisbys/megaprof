@extends('layouts.__master')

@section('login-button')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="">
                <div class="panel panel-primary col-md-5 nopadding">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        @include('signup.blade.php')

                        @include('auth.login')


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
