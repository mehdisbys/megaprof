@extends('layouts.master')

@section('content')

    @if(isset($checkedSubjects))
        {!! Form::open(['url' => "/modifier-annonce-1/{$advert_id}"]) !!}
        {!! Form::hidden('advert_id', $advert_id) !!}
    @else
        {!! Form::open(['url' => '/nouvelle-annonce-1']) !!}
    @endif

        <div class="col-md-6 col-md-offset-3">

            <h2>Quelle(s) matière(s) enseignez-vous ?</h2>

            @foreach ($subjects as $subject)
                <div class="toggle toggle-bg clearfix">

                    <div class="togglet">
                        <i class="toggle-closed icon-ok-circle"></i>
                        <i class="toggle-open icon-remove-circle"></i>
                        {{$subject->name}}
                    </div>

                    <div class="togglec" style="display: none;">
                        @foreach ($subject->subSubjects as $subs)
                            <div class="ck-button">
                                <input class="no-display" type="checkbox" name="subjects[]" id="{{$subs->id}}"
                                       value="{{$subs->id}}"
                                       @if(isset($checkedSubjects) and in_array($subs->id, $checkedSubjects))
                                       checked
                                        @endif
                                >
                                <label class="" for="{{$subs->id}}">
                                    <span>{{$subs->name}}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                </div>
            @endforeach

            <div class="col-md-12 text-center">

                <button type="submit" class="button button-3d button-large button-rounded button-green">
                    J'ai sélectionné les matières de mon annonce
                </button>
            </div>
        </div>

        {!! Form::close() !!}
@endsection