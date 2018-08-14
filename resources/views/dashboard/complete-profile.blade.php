@extends('layouts.__master')

@section('content')


    <div class="col-md-offset-3 col-md-4">
        {!! Form::model($user, ['url' => '/editer-profil']) !!}

        @if($user->gender == null)
            <div class="form-group col-md-12">
                <div class="col-md-6">
                    {!! Form::label('gender_man', __('dashboard/complete-profile.man')) !!}
                    {!! Form::radio('gender','man', $user->gender,['class' => '', 'id' => 'gender_man']) !!}
                </div>

                <div class="col-md-6">
                    {!! Form::label('gender_woman', __('dashboard/complete-profile.man')) !!}
                    {!! Form::radio('gender','woman', $user->gender,['class' => '', 'id' => 'gender_woman']) !!}
                </div>

            </div>
        @endif

        @if($user->birthdate == null)
            <div class="form-group col-md-12">
                {!! Form::label('birthdate', __('dashboard/complete-profile.birthdate')) !!}
                {!! Form::text('birthdate', $user->birthdate, ['class' => 'form-control', 'required' => "required"]) !!}
            </div>
        @endif

        @if($user->telephone == null)
            <div class="form-group col-md-12">
                {!! Form::label('telephone', __('dashboard/complete-profile.mobile')) !!}
                {!! Form::text('telephone', $user->telephone, ['class' => 'form-control', 'required' => "required"]) !!}
            </div>
        @endif

        <div class="col-md-offset-3 col-md-8">
            <button class="btn btn-success" type="submit">@lang('dashboard/complete-profile.completeProfile')</button>
        </div>

        {!! Form::close() !!}
    </div>
@endsection