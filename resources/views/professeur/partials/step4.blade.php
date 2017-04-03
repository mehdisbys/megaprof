{!! HTML::script("js/parsley.min.js")!!}

    @include('professeur.process-steps.process-steps', ['step1' => 'complete', 'step2' => 'complete', 'step3' => 'complete', 'step4' => 'active'])

<div class="container">
    @include('includes.inputErrors')

@if(\Illuminate\Support\Facades\Request::is('*modifier-annonce*'))
    <form id="presentation-content" accept-charset="UTF-8"
          action="/modifier-annonce-4/{{$advert->id}}" method="POST" data-parsley-validate>
        @else
            <form id="presentation-content" accept-charset="UTF-8"
                  action="/nouvelle-annonce-4" method="POST" data-parsley-validate>
                @endif
                {!! csrf_field() !!}

                {!! Form::hidden('advert_id', $advert_id) !!}
                <div class="col-md-8 col-md-offset-4 clearfix"><h2>Description et expertise</h2></div>

                <div class="col-md-1"></div>

                <div class="col-md-8 tabs side-tabs">

                    <ul class="tab-nav tab-nav2"
                        role="tablist">
                        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active ui-state-focus"
                            role="tab" tabindex="0" aria-controls="tabs-21" aria-labelledby="ui-id-37"
                            aria-selected="true" aria-expanded="true">
                            <a href="#description" class="ui-tabs-anchor"
                               role="presentation" tabindex="-1"
                               id="ui-id-37">Description et Expertise*</a></li>
                        <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-22"
                            aria-labelledby="ui-id-38" aria-selected="false" aria-expanded="false">
                            <a href="#experience"
                               class="ui-tabs-anchor"
                               role="presentation"
                               tabindex="-1"
                               id="ui-id-38">Expérience*</a></li>
                        <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-23"
                            aria-labelledby="ui-id-39" aria-selected="false" aria-expanded="false" id="education-tab">
                            <a href="#education"
                               class="ui-tabs-anchor"
                               role="presentation"
                               tabindex="-1"
                               id="ui-id-39">CV et Formation*</a></li>
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content" id="description">

                            {!! Form::label('presentation','Présentation personelle et contenu de vos cours') !!}
                            <div class="leftmargin-sm">
                                <ul class="form-inputs-informations">

                                    Présentez-vous à vos futurs élèves et décrivez leurs votre parcours. <br>
                                    Cela leur permettra de mieux vous connaitre
                                    <li>Qu'est ce qui vous distingue des autres professeurs ?</li>
                                    <li>Comment se déroule votre cours et quels sont vos objectifs</li>
                                </ul>
                            </div>

                            <?php $presentation = isset($advert) ? $advert->presentation : null; ?>

                            {!! Form::textarea('presentation',$presentation,['class' => 'sm-form-control', 'id' => 'presentation',
                            'required' => "required",
                            'data-parsley-required-message'=>"Ce champs est requis",
                            'data-parsley-minimumwords' => "30",
                            'title' => "Entrez au moins 30 mots"]) !!}
                            <p id="presentation-text"><span id="presentation-count">30</span> mots manquants pour être
                                efficace
                            </p>

                        </div>

                        <div class="tab-content" id="experience">


                            {!! Form::label('content','Expérience dans les matières sélectionnées') !!}
                            <div class="leftmargin-sm">
                                <ul class="form-inputs-informations">

                                    <li>Depuis combien de temps donnez-vous des cours ?</li>
                                    <li>Racontez comment vous avez aidé vos élèves a obtenir de meilleures notes, leurs diplômes ou a réussir leurs concours, etc..</li>
                                </ul>
                            </div>
                            <?php $content = isset($advert) ? $advert->content : null; ?>
                            {!! Form::textarea('content',$content,['class' => 'sm-form-control', 'id' => 'content',
                            'required' => "required",
                            'data-parsley-required-message'=>"Ce champs est requis",
                            'data-parsley-minimumwords' => "30",
                            'title' => "Entrez au moins 30 mots"]) !!}
                            <div id="content-text"><span id="content-count">30</span> mots manquants pour être efficace
                            </div>

                            <em class="small">Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître
                                dans
                                vos
                                textes.</em>
                        </div>

                        <div class="tab-content" id="education">

                            {!! Form::label('experience','Parcours professionel et formation') !!}
                            <div class="leftmargin-sm">

                                <ul class="form-inputs-informations">
                                    <li>Vos diplômes obtenus ou en cours d'obtention</li>
                                    <li>Vos loisirs en lien avec l'activité proposée</li>
                                    <li>Une anecdote qui fournira un plus à votre annonce</li>
                                </ul>
                            </div>
                            <?php $experience = isset($advert) ? $advert->experience : null; ?>

                            {!! Form::textarea('experience', $experience,['class' => 'sm-form-control', 'id' => 'experience',
                             'required' => "required",
                             'data-parsley-required-message'=>"Ce champs est requis",
                             'data-parsley-minimumwords' => "30",
                             'title' => "Entrez au moins 30 mots"]) !!}

                            <div id="experience-text"><span id="experience-count">30</span> mots manquants pour être
                                efficace
                            </div>
                            <em class="small">Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître
                                dans
                                vos
                                textes.</em>
                        </div>
                    </div>
                    <p class="form-inputs-informations small col-md-8 col-md-offset-4 topmargin-small">
                        Ce qui plait aux élèves c'est une annonce professionnelle de qualité alors n'oubliez pas de faire attention à votre style d'écriture et aux fautes d'orthographe
                        <br>
                        <em>Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître dans vos
                            textes.</em>
                    </p>
                </div>


                <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                    <div class="bs-callout bs-callout-warning col-md-6 col-md-offset-3 alert alert-danger hidden">
                        <h4>Il manque quelques champs à remplir</h4>
                        <strong>Veuillez remplir toutes les sections comportant une astérisque(*) avant de continuer.</strong>
                    </div>
                    <button type="submit" class="button button-3d button-large button-rounded">
                        J'ai défini le contenu de mes cours
                    </button>
                </div>

                {!! Form::close() !!}

    {!! HTML::script("js/step4.js")!!}

</div>