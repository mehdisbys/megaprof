@extends('layouts.__master')

@section('content')


    <div class="col-md-offset-3 col-md-4">
        {!! Form::model($user, ['url' => '/editer-profil']) !!}

        @if($user->gender == null)
            <div class="form-group col-md-12">
                <div class="col-md-6">
                    {!! Form::label('gender_man', 'Homme') !!}
                    {!! Form::radio('gender','man', $user->gender,['class' => '', 'id' => 'gender_man']) !!}
                </div>

                <div class="col-md-6">
                    {!! Form::label('gender_woman', 'Femme') !!}
                    {!! Form::radio('gender','woman', $user->gender,['class' => '', 'id' => 'gender_woman']) !!}
                </div>

            </div>
        @endif

        @if($user->birthdate == null)
            <div class="form-group col-md-12">
                {!! Form::label('birthdate', 'Date de naissance') !!}
                {!! Form::text('birthdate', $user->birthdate, ['class' => 'form-control', 'required' => "required"]) !!}
            </div>
        @endif

        @if($user->telephone == null)
            <div class="form-group col-md-12">
                {!! Form::label('telephone', 'Telephone portable') !!}
                {!! Form::text('telephone', $user->telephone, ['class' => 'form-control', 'required' => "required"]) !!}
            </div>
        @endif

        <div class="col-md-offset-3 col-md-8">
            <button class="btn btn-success" type="submit">Compléter mon profil</button>
        </div>

        {!! Form::close() !!}
    </div>
@endsection