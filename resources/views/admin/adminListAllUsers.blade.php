@extends('layouts.master')

@section('content')

    <h1 class="center">Administration </h1>
    <div class="col-md-10 topmargin-lg col-md-offset-1" id="content">

        @foreach($usersGroupedByDate as $date => $users)
            <div class="">
            <h4 class="col-md-12 bottommargin-lg center">{{ implode('/',array_reverse(explode('-', $date)))}}</h4>
            <hr>

            @foreach($users as $user)

                <div class="row  bottommargin-sm">

                    <div class="col-md-2">{{$user->firstname}}</div>

                    <div class="col-md-4">
                        <a href="/admin/email-user/{{$user->id}}">{{$user->email}}</a>
                    </div>

                    <div class="col-md-3">
                        @if($user->facebook_id != NULL)
                            <a href="http://www.facebook.com/{{$user->facebook_id}}"> <i
                                        class="fa fa-facebook-square"></i> Compte Facebook</a>

                        @else
                            N/A
                        @endif
                    </div>

                    <div class="col-md-3"><a href="/login-as/{{$user->id}}">Voir le tableau de bord</a></div>

                </div>
            @endforeach
            </div>
        @endforeach

    </div>
@endsection