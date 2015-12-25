@extends('layouts.master')

@section('content')

    {!! HTML::script("js/parsley.min.js")!!}

    <form id="presentation-content"  accept-charset="UTF-8"
          action="/nouvelle-annonce-4" method="POST" data-parsley-validate>

        {!! csrf_field() !!}

        {!! Form::hidden('advert_id', $advert_id) !!}

        <div class="col-md-6 col-md-offset-3">

            <h2>Description et expertise</h2>

            {!! Form::label('presentation','Présentation personelle et contenu de vos cours') !!}
            <div class="leftmargin-sm">
                <ul class="form-inputs-informations">
                    <li>Qui êtes-vous en quelques mots et à qui s'adressent les cours (diplôme, niveau, classe, spécificités,etc.) ?</li>
                    <li>Vos techniques et méthodes d'enseignement ? (déroulement du cours)</li>
                    <li>Vos spécificités en tant que professeur ? (méthodologie)</li>
                </ul>
            </div>

            {!! Form::textarea('presentation',null,['class' => 'sm-form-control', 'id' => 'presentation',
            'required' => "required",
            'data-parsley-required-message'=>"Ce champs est requis",
            'data-parsley-minimumwords' => "40",
            'title' => "Entrez au moins 40 mots"]) !!}
            <p id="presentation-text"><span id="presentation-count">40</span> mots manquants pour être efficace</p>
            <p class="form-inputs-informations small">
                C'est la première chose que les élèves vont lire sur vos cours, pensez à bien soigner l'orthographe et
                le style de vos textes pour qu'ils soient les plus attractifs et sympathiques possibles.<br>
                <em>Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître dans vos textes.</em>
            </p>

            <div class="divider divider-short divider-rounded divider-center"><i class="icon-pencil"></i></div>

            {!! Form::label('content','Expérience dans les matières sélectionnées') !!}
            <div class="leftmargin-sm">
                <ul class="form-inputs-informations">
                    <li>Depuis combien de temps donnez-vous des cours ?</li>
                    <li>Combien d'élèves avez-vous déjà formés ?</li>
                    <li>Quels résultats vos élèves ont-ils obtenu grâce à vous (notes, diplômes, etc.) ?</li>
                </ul>
            </div>
            {!! Form::textarea('content',null,['class' => 'sm-form-control', 'id' => 'content',
            'required' => "required",
            'data-parsley-required-message'=>"Ce champs est requis",
            'data-parsley-minimumwords' => "40",
            'title' => "Entrez au moins 40 mots"]) !!}
            <div id="content-text"><span id="content-count">40</span> mots manquants pour être efficace</div>

            <em class="small">Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître dans vos textes.</em>

            <div class="divider divider-short divider-rounded divider-center"><i class="icon-pencil"></i></div>

            {!! Form::label('experience','Présentation personelle et contenu de vos cours') !!}
            <div class="leftmargin-sm">

                <ul class="form-inputs-informations">
                    <li>Vos diplômes obtenus ou en cours d'obtention</li>
                    <li>Vos récompenses ou distinctions</li>
                    <li>Vos expériences professionnelles en lien avec vos matières enseignées</li>
                </ul>
            </div>
            {!! Form::textarea('experience',null,['class' => 'sm-form-control', 'id' => 'experience',
             'required' => "required",
             'data-parsley-required-message'=>"Ce champs est requis",
             'data-parsley-minimumwords' => "40",
             'title' => "Entrez au moins 40 mots"]) !!}

            <div id="experience-text"><span id="experience-count">40</span> mots manquants pour être efficace</div>
            <em class="small">Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître dans vos textes.</em>

        </div>

        <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
            <button type="submit" class="button button-3d button-large button-rounded button-green">
                J'ai défini le contenu de mes cours
            </button>
        </div>

        {!! Form::close() !!}

        <script>
            $(document).ready(function() {

                var countWords = function (string) {
                    return string
                                    .replace( /(^\s*)|(\s*$)/gi, "" )
                                    .replace( /\s+/gi, " " )
                                    .split(' ').length -1 ;
                };

                var updateCount = function (el, expected) {
                    var nb = expected - countWords($(el).val());
                    if(nb > 0)
                    {
                        $("#" + $(el).attr('id') + "-text").removeClass('no-display');
                        $("#" + $(el).attr('id') + "-count").text(nb);

                    }
                    if(nb <= 0)
                    {
                        $("#" + $(el).attr('id') + "-count").text('');
                        $("#" + $(el).attr('id') + "-text").addClass('no-display');
                    }
                    return nb;
                };
                var count40 = function(el){ return updateCount(el,40);};

                $(".sm-form-control").on("keypress change" , (function() { count40(this); }));

                window.Parsley
                        .addValidator('minimumwords', {
                            requirementType: 'string',
                            validateString: function(value, requirement) {
                                console.log('test');
                                return countWords(value) > requirement;
                            },
                            messages: {
                                en: 'Veuillez entrer au minimum %s mots dans cette section'
                            }
                        });
            });
        </script>

@endsection