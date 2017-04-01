{!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
{!! HTML::style("temp-css/awesomplete.css") !!}
@if(isset($advert) == false)
    @include('professeur.process-steps.process-steps')
@endif

<div class="container">

    @include('includes.inputErrors')

    @if(isset($checkedSubjects) and $checkedSubjects != NULL)
        <form method="POST" action="/modifier-annonce-1/{{$advert_id}}" accept-charset="UTF-8"
              id="subject_form">
            {!! Form::hidden('advert_id', $advert_id) !!}
            @else
                <form method="POST" action="/nouvelle-annonce-1" accept-charset="UTF-8"
                      id="subject_form">
                    @endif
                    {!! csrf_field() !!}

                    <div class="col-md-10 col-md-offset-2">

                        <h2 class="col-md-12">Quelle(s) matière(s) enseignez-vous ?</h2>
                        <div class="col-md-8">
                            <input
                                    id="subject_input"
                                    class="sm-form-control bottommargin-sm col-md-12"
                                    placeholder="Choisissez une ou plusieurs matières"
                                    data-minchars="1"
                                    data-autofirst="1"
                                    data-list="{!! $subsubjects !!}"
                                    name="subjects_text"
                                    type="text"
                                    autocomplete="off"
                                    aria-autocomplete="list"
                                    data-multiple/>
                        </div>
                        <div class="col-md-6 col-md-offset-3 bottommargin-sm">Ou choisissez-en ci-dessous</div>

                        <div class="col-md-10 tabs side-tabs">

                            <ul class="tab-nav tab-nav2" role="tablist">
                                @foreach ($subjects as $subject)
                                    <li class="ui-state-default ui-corner-top"
                                        role="tab" tabindex="-1" aria-selected="false" aria-expanded="false">
                                        <a href="#subject-{{$subject->id}}" class="ui-tabs-anchor"
                                           role="presentation" tabindex="-1"
                                           id="ui-{{$subject->id}}">{{$subject->name}}
                                            ({{ $subject->subSubjects->count() }}
                                            )</a></li>
                                @endforeach
                            </ul>

                            <div class="tab-container">

                                @foreach ($subjects as $subject)

                                    <div class="tab-content" id="subject-{{$subject->id}}">
                                        @foreach ($subject->subSubjects->sortBy('name') as $subs)
                                            <div class="col-md-6">
                                                <input class="" type="checkbox" name="subjects[]" id="{{$subs->id}}"
                                                       value="{{$subs->id}} "
                                                       @if(isset($checkedSubjects) and in_array($subs->id, $checkedSubjects))
                                                       checked
                                                        @endif
                                                >
                                                <label class="" for="{{$subs->id}}"
                                                       style="text-transform: none; font-weight: 100">
                                                    <span>{{$subs->name}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 text-center">
                        <div id="input_error_message" class=" col-md-6 col-md-offset-3 alert alert-danger hidden">
                            <strong>Veuillez sélectionner une matière avant de passer à l'étape suivante.</strong>
                        </div>
                        <button type="submit" class="button button-3d button-large button-rounded">
                            J'ai sélectionné les matières de mon annonce
                        </button>
                    </div>

        {!! Form::close() !!}
        @include('includes.awesomeplete.diacritics')

        {!! HTML::script("js/step1.js")!!}

</div>