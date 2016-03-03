{!! HTML::script("js/parsley.min.js")!!}

@if(isset($advert))
    <form method="POST" action="/modifier-annonce-2/{{$advert_id}}" accept-charset="UTF-8" data-parsley-validate id="title_form">
        {!! Form::hidden('advert_id', $advert_id) !!}
        @else
            <form method="POST" action="/nouvelle-annonce-2" accept-charset="UTF-8" data-parsley-validate id="title_form">
                @endif

                {!! csrf_field() !!}
                <div class="col-md-6 col-md-offset-3">

                    <h2>Titre de l'annonce et Niveaux</h2>

                    <label for='title' class="topmargin-sm">Titre de votre annonce </label>

                    <?php $title = isset($advert) ? $advert->title : null; ?>

                    {!! Form::input('text', 'title', $title, ['class' => 'sm-form-control required', 'data-parsley-required-message'=>"N'oubliez pas de choisir un titre pour votre annonce",]) !!}

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
                                                   id="{{$subject->id ."_". $subs->id}}" value="{{$subs->id}}" data-parsley-required data-parsley-required-message=""
                                                   @if(isset($checked) and isset($checked[$subject->id]) and in_array($subs->id, $checked[$subject->id]))
                                                   checked="on"
                                                    @endif
                                            >
                                            <label class="" for="{{$subject->id ."_". $subs->id}}">
                                                <span>{{$subs->name}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                    <div class="col-md-12 text-center">
                        <div class="bs-callout bs-callout-warning hidden">
                            <h4>Erreur :-(</h4>
                            <p>Veuillez sélectionner un niveau avant de passer à l'étape suivante.</p>
                        </div>
                        <button type="submit" class="button button-3d button-large button-rounded button-green">
                            Je valide mes choix
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
                <script type="text/javascript">
                    $(function () {
                        $('#title_form').parsley().on('field:validated', function() {

                                    var ok = $('.parsley-error').length === 0;

                                    $('.bs-callout-warning').toggleClass('hidden', ok);
                                })
                                .on('form:submit', function() {
                                    return true; // Don't submit form for this demo
                                });
                        window.Parsley
                                .addValidator('titre-requis', {
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
