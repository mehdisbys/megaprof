@extends('layouts.master')

@section('content')
    {!! Form::open(['url' => '/nouvelle-annonce-1']) !!}

    <div class="col-md-6 col-md-offset-3">

        <label for='title'>Titre de votre annonce </label>
        {!! Form::input('text', 'title', null, ['class' => 'sm-form-control required']) !!}

        <div class="clear topmargin-sm"> </div>


        @foreach ($subjects as $subject)

            <h4>{{ $subject->name }}</h4>

            @foreach($levels as $level)

                <div class="toggle toggle-bg clearfix">

                    <div class="togglet">
                        <i class="toggle-closed icon-ok-circle"></i>
                        <i class="toggle-open icon-remove-circle"></i>
                        {{$level->name}}
                    </div>

                    <div class="togglec" style="display: none;">
                        @foreach ($level->subLevels as $subs)
                            <div class="ck-button">
                                <input class="no-display" type="checkbox" name="levels[]" id="{{$subs->id}}" value="{{$subs->id}}">
                                <label class="" for="{{$subs->id}}">
                                    <span>{{$subs->name}}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        @endforeach

        <div class="col-md-12 text-center">
            <button type="submit" class="button button-3d button-large button-rounded button-green">
                Je valide mes choix
            </button>
        </div>
    </div>

    {!! Form::close() !!}


@endsection