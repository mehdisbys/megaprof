@extends('layouts.master')

@section('content')
    @if(isset($advert))
        {!! Form::open(['url' => "/modifier-annonce-2/{$advert_id}"]) !!}
    @else
        {!! Form::open(['url' => '/nouvelle-annonce-2']) !!}
    @endif

    <div class="col-md-6 col-md-offset-3">

        <h2>Titre de l'annonce et Niveaux</h2>

        <label for='title' class="topmargin-sm">Titre de votre annonce </label>

        <?php $title = isset($advert) ? $advert->title : null; ?>

        {!! Form::input('text', 'title', $title, ['class' => 'sm-form-control required']) !!}

        {!! Form::hidden('advert_id', $advert_id) !!}
        <div class="clear topmargin-sm"></div>


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
                                <input class="no-display" type="checkbox" name="levels[{{$subject->id}}][]"
                                       id="{{$subject->id ."_". $subs->id}}" value="{{$subs->id}}">
                                <label class="" for="{{$subject->id ."_". $subs->id}}">
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