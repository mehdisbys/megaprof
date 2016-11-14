{!! HTML::script("js/parsley.min.js")!!}
{!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
{!! HTML::style("temp-css/awesomplete.css") !!}

@include('professeur.process-steps.process-steps')

@if(isset($checkedSubjects) and $checkedSubjects != NULL)
    <form method="POST" action="/modifier-annonce-1/{{$advert_id}}" accept-charset="UTF-8" data-parsley-validate
          id="subject_form">
        {!! Form::hidden('advert_id', $advert_id) !!}
        @else
            <form method="POST" action="/nouvelle-annonce-1" accept-charset="UTF-8" data-parsley-validate
                  id="subject_form">
                @endif
                {!! csrf_field() !!}


                <div class="col-md-6 col-md-offset-3">

                    <h2>Quelle(s) matière(s) enseignez-vous ?</h2>
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
                    <div class="col-md-6 col-md-offset-3 bottommargin-sm">Ou choisissez-en ci-dessous</div>


                @foreach ($subjects as $subject)
                        <div class="toggle toggle-bg col-md-6">

                            <div class="togglet" style="background-color: transparent; border: 1px dashed black;">
                                <i class="toggle-closed icon-ok-circle"></i>
                                <i class="toggle-open icon-remove-circle"></i>
                                {{$subject->name}} ({{ $subject->subSubjects->count() }})
                            </div>


                            <div class="togglec" style="display: none;">
                                @foreach ($subject->subSubjects as $subs)
                                    <div class="">
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
                @include('includes.awesomeplete.diacritics')

                <script type="text/javascript">
                    $(function () {
                        $('#subject_form').parsley().on('field:validated', function () {

                            var ok = $('.parsley-error').length === 0;

                            $('.bs-callout-warning').toggleClass('hidden', ok);
                        })
                                .on('form:submit', function () {
                                    return true;
                                });

                        new Awesomplete(document.getElementById('subject_input'), {
                            filter: function (text, input) {
                                return new RegExp("^" + removeDiacritics(input.match(/[^,]*$/)[0].trim()), "i").test(removeDiacritics(text));
                            },
                            replace: function (text) {
                                var before = this.input.value.match(/^.+,\s*|/)[0];
                                this.input.value = before + text + ", ";
                            }
                        });

                    });


                </script>