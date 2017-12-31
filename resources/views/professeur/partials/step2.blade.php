{!! HTML::script("js/parsley.min.js")!!}

    @include('professeur.process-steps.process-steps', ['step1' => 'complete', 'step2' => 'active'])

<div class="container">

    @include('includes.inputErrors')

    @if(\Illuminate\Support\Facades\Request::is('*modifier-annonce*'))
        <form method="POST" action="/modifier-annonce-2/{{$advert_id}}" accept-charset="UTF-8" data-parsley-validate
              id="title_form">
            {!! Form::hidden('advert_id', $advert_id) !!}
            @else
                <form method="POST" action="/nouvelle-annonce-2" accept-charset="UTF-8" data-parsley-validate
                      id="title_form">
                    @endif

                    {!! csrf_field() !!}
                    <div class="col-md-6 col-md-offset-3">

                        <h2>Titre de l'annonce et Niveaux</h2>

                        <label for='title' class="topmargin-sm">Titre de votre annonce </label>

                        <?php $title = isset($advert) ? $advert->title : null; ?>

                        {!! Form::input('text', 'title', $title, ['class' => 'sm-form-control required',
                        'data-parsley-minimumwords' => "10",
                        'data-parsley-maximumwords' => "15",
                        'title' => "Entrez au minimum 10 mots et au maximum 15 mots",
                        'id' => 'title',
                         'data-parsley-required-message'=>"N'oubliez pas de choisir un titre pour votre annonce",]) !!}
                        <p id="title-text"><span id="title-count">10</span> mots manquants pour être
                            efficace
                        </p>
                        <p id="title-max" class="no-display">N'entrez pas plus de 15 mots pour que le titre ne soit pas trop long</p>
                        <em>En général le titre contient l'activité enseignée, la ville et ce qui vous distingue des autres
                            professeurs (diplômes, expérience..)</em>

                        {!! Form::hidden('advert_id', $advert_id) !!}
                        <div class="clear topmargin-sm"></div>

                        <div class="col-md-10 col-md-offset-2 bottommargin-sm clearfix">Indiquez le niveau enseigné pour chaque activité
                        </div>


                        @foreach ($subjects as $subject)

                            <h4>{{ $subject->name }}</h4>

                            @foreach($levels as $level)

                                <div class="toggle toggle-bg clearfix" id="toggle_{{$subject->id}}">

                                    <div class="togglet"
                                         style="background-color: transparent; border: 1px dashed black;">
                                        <i class="toggle-closed icon-ok-circle"></i>
                                        <i class="toggle-open icon-remove-circle"></i>
                                        {{$level->name}}
                                    </div>

                                    <div class="togglec" style="display: none;">
                                        @foreach ($level->subLevels as $subs)
                                            <div class="col-md-4">
                                                <input class="" type="checkbox" name="levels[{{$subject->id}}][]"
                                                       id="{{$subject->id ."_". $subs->id}}" value="{{$subs->id}}"
                                                       data-parsley-required data-parsley-required-message=""
                                                       @if(isset($checked) and isset($checked[$subject->id]) and in_array($subs->id, $checked[$subject->id]))
                                                       checked="on"
                                                        @endif
                                                >
                                                <label class="" for="{{$subject->id ."_". $subs->id}}"
                                                       style="text-transform: none; font-weight: 100">
                                                    <span>{{$subs->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                        <div class="col-md-12 text-center">
                            <div class="bs-callout bs-callout-warning  col-md-6 col-md-offset-3 alert alert-danger hidden">
                                <ul>
                                    <li class="bottommargin-sm"><strong class="">Entrez un titre comprenant entre 10 et 15 mots.</strong></li>
                                    <li><strong>Veuillez sélectionner au moins un niveau par activité avant de passer à l'étape
                                            suivante.</strong></li>
                                </ul>



                            </div>
                            <button type="submit" class="button button-3d button-large button-rounded" id="submitStep2">
                                Je valide mes choix
                            </button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                    {!! HTML::script("js/step2.js")!!}

</div>