@extends('layouts.master')

@section('content')
    {!! HTML::script("js/parsley.min.js")!!}

    @if(isset($checkedSubjects))
        <form method="POST" action="/modifier-annonce-1/{{$advert_id}}" accept-charset="UTF-8" data-parsley-validate id="subject_form">
        {!! Form::hidden('advert_id', $advert_id) !!}
    @else
        <form method="POST" action="/nouvelle-annonce-1" accept-charset="UTF-8" data-parsley-validate id="subject_form">
    @endif
            {!! csrf_field() !!}

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
                                       value="{{$subs->id}} " data-parsley-required
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
                <div class="bs-callout bs-callout-warning hidden">
                    <h4>Erreur :-(</h4>
                    <p>Veuillez sélectionner une matière avant de passer à l'étape suivante.</p>
                </div>
                <button type="submit" class="button button-3d button-large button-rounded button-green">
                    J'ai sélectionné les matières de mon annonce
                </button>
            </div>
        </div>

        {!! Form::close() !!}

        <script type="text/javascript">
                $(function () {
                    $('#subject_form').parsley().on('field:validated', function() {

                                var ok = $('.parsley-error').length === 0;

                                $('.bs-callout-warning').toggleClass('hidden', ok);
                            })
                            .on('form:submit', function() {
                                return true; // Don't submit form for this demo
                            });
                });
    </script>
@endsection