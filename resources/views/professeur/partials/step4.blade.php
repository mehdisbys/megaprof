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

                <div class="col-md-8 col-md-offset-2">

                    <div class="col-md-12">

                        <div class="col-md-12 bottommargin-sm" id="description">

                            {!! Form::label('presentation','Présentation personelle et contenu de vos cours') !!}
                            <div class="leftmargin-sm">
                                Présentez-vous à vos futurs élèves et décrivez leurs votre parcours. <br>
                                Cela leur permettra de mieux vous connaitre
                                <ul class="form-inputs-informations topmargin-sm">
                                    <li>Qu'est ce qui vous distingue des autres professeurs ?</li>
                                    <li>Comment se déroule votre cours et quels sont vos objectifs</li>
                                </ul>
                            </div>

                            <?php $presentation = isset($advert) ? $advert->presentation : null; ?>

                            {!! Form::textarea('presentation',$presentation,['class' => 'sm-form-control', 'id' => 'presentation',
                            'required' => "required",
                            'data-parsley-required-message'=>"Ce champs est requis",
                            'data-parsley-minimumwords' => "20",
                            'title' => "Entrez au moins 20 mots"]) !!}
                            <p id="presentation-text"><span id="presentation-count">20</span> mots manquants pour être
                                efficace
                            </p>

                        </div>

                        <div class="bottommargin-sm" id="experience">


                            {!! Form::label('content','Expérience dans les matières sélectionnées') !!}
                            <div class="leftmargin-sm">
                                <ul class="form-inputs-informations">

                                    <li>Depuis combien de temps donnez-vous des cours ?</li>
                                    <li>Racontez comment vous avez aidé vos élèves a obtenir de meilleures notes, leurs diplômes ou a réussir leurs concours, etc..</li>
                                </ul>
                            </div>
                            <?php $content = isset($advert) ? $advert->content : null; ?>
                            {!! Form::textarea('content',$content,['class' => 'sm-form-control', 'id' => 'content']) !!}

                            <em class="small ">Vos nom de famille, numéro de téléphone et adresse e-mail  ne doivent pas apparaître</em>
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

                            {!! Form::textarea('experience', $experience,['class' => 'sm-form-control', 'id' => 'experience']) !!}

                            <em class="small">Vos nom de famille, numéro de téléphone et adresse e-mail  ne doivent pas apparaître</em>
                        </div>
                    </div>
                    <p class="form-inputs-informations small col-md-8 col-md-offset-2 topmargin-small">
                        Ce qui plait aux élèves c'est une annonce professionnelle de qualité alors n'oubliez pas de faire attention à votre style d'écriture et aux fautes d'orthographe.
                        <br>
                        <br>
                         {{--<em  style="color: indianred"><i class="fa fa-info-circle fa-2x"></i> Veuillez ne pas inclure vos nom de famille, numéro de téléphone et   e-mail.--}}
                             {{--<br> (Dans le cas contraire l'annonce ne sera pas validée par la modération.)</em>--}}
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