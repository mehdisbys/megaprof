{!! HTML::script("js/parsley.min.js")!!}

@if(isset($advert) == false)
    @include('professeur.process-steps.process-steps', ['step1' => 'complete', 'step2' => 'complete', 'step3' => 'complete', 'step4' => 'active'])
@endif

@if(isset($advert))
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
                                    <li>Qui êtes-vous en quelques mots et à qui s'adressent les cours (diplôme, niveau,
                                        classe,
                                        spécificités,etc.) ?
                                    </li>
                                    <li>Vos techniques et méthodes d'enseignement ? (déroulement du cours)</li>
                                    <li>Vos spécificités en tant que professeur ? (méthodologie)</li>
                                </ul>
                            </div>

                            <?php $presentation = isset($advert) ? $advert->presentation : null; ?>

                            {!! Form::textarea('presentation',$presentation,['class' => 'sm-form-control', 'id' => 'presentation',
                            'required' => "required",
                            'data-parsley-required-message'=>"Ce champs est requis",
                            'data-parsley-minimumwords' => "40",
                            'title' => "Entrez au moins 40 mots"]) !!}
                            <p id="presentation-text"><span id="presentation-count">40</span> mots manquants pour être
                                efficace
                            </p>
                            <p class="form-inputs-informations small">
                                C'est la première chose que les élèves vont lire sur vos cours, pensez à bien soigner
                                l'orthographe et
                                le style de vos textes pour qu'ils soient les plus attractifs et sympathiques possibles.<br>
                                <em>Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître dans vos
                                    textes.</em>
                            </p>
                        </div>

                        <div class="tab-content" id="experience">


                            {!! Form::label('content','Expérience dans les matières sélectionnées') !!}
                            <div class="leftmargin-sm">
                                <ul class="form-inputs-informations">
                                    <li>Depuis combien de temps donnez-vous des cours ?</li>
                                    <li>Combien d'élèves avez-vous déjà formés ?</li>
                                    <li>Quels résultats vos élèves ont-ils obtenu grâce à vous (notes, diplômes, etc.) ?
                                    </li>
                                </ul>
                            </div>
                            <?php $content = isset($advert) ? $advert->content : null; ?>
                            {!! Form::textarea('content',$content,['class' => 'sm-form-control', 'id' => 'content',
                            'required' => "required",
                            'data-parsley-required-message'=>"Ce champs est requis",
                            'data-parsley-minimumwords' => "40",
                            'title' => "Entrez au moins 40 mots"]) !!}
                            <div id="content-text"><span id="content-count">40</span> mots manquants pour être efficace
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
                                    <li>Vos récompenses ou distinctions</li>
                                    <li>Vos expériences professionnelles en lien avec vos matières enseignées</li>
                                </ul>
                            </div>
                            <?php $experience = isset($advert) ? $advert->experience : null; ?>

                            {!! Form::textarea('experience', $experience,['class' => 'sm-form-control', 'id' => 'experience',
                             'required' => "required",
                             'data-parsley-required-message'=>"Ce champs est requis",
                             'data-parsley-minimumwords' => "40",
                             'title' => "Entrez au moins 40 mots"]) !!}

                            <div id="experience-text"><span id="experience-count">40</span> mots manquants pour être
                                efficace
                            </div>
                            <em class="small">Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître
                                dans
                                vos
                                textes.</em>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                    <div class="bs-callout bs-callout-warning hidden">
                        <h4>Erreur :-(</h4>
                        <p>Veuillez remplir toutes les sections comportant une astérisque(*) avant de continuer.</p>
                    </div>
                    <button type="submit" class="button button-3d button-large button-rounded button-green">
                        J'ai défini le contenu de mes cours
                    </button>
                </div>

                {!! Form::close() !!}

                <script>
                    $(document).ready(function () {

                        var countWords = function (string) {
                            return string
                                            .replace(/(^\s*)|(\s*$)/gi, "")
                                            .replace(/\s+/gi, " ")
                                            .split(' ').length - 1;
                        };

                        var updateCount = function (el, expected) {
                            var nb = expected - countWords($(el).val());
                            if (nb > 0) {
                                $("#" + $(el).attr('id') + "-text").removeClass('no-display');
                                $("#" + $(el).attr('id') + "-count").text(nb);

                            }
                            if (nb <= 0) {
                                $("#" + $(el).attr('id') + "-count").text('');
                                $("#" + $(el).attr('id') + "-text").addClass('no-display');
                            }
                            return nb;
                        };

                        var count40 = function (el) {
                            return updateCount(el, 40);
                        };

                        $(".sm-form-control").on("keypress change", (function () {
                            count40(this);
                        }));

                        window.Parsley
                                .addValidator('minimumwords', {
                                    requirementType: 'string',
                                    validateString: function (value, requirement) {
                                        return countWords(value) > requirement;
                                    },
                                    messages: {
                                        en: 'Veuillez entrer au minimum %s mots dans cette section'
                                    }
                                });


                        $('#presentation-content').parsley()
                                .on('field:validated', function () {

                                    var ok = $('.parsley-error').length === 0;

                                    $('.bs-callout-warning').toggleClass('hidden', ok);
                                })
                                .on('form:submit', function () {
                                    return true;
                                });
                    });
                </script>