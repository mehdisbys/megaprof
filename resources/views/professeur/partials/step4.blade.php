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
                <div class="col-md-8 col-md-offset-4 clearfix"><h2>@lang('professeur/partials/step4.descriptionTitle')</h2></div>

                <div class="col-md-8 col-md-offset-2">

                    <div class="col-md-12">

                        <div class="col-md-12 bottommargin-sm" id="description">

                            {!! Form::label('presentation',__('professeur/partials/step4.presentYourself')) !!}
                            <div class="leftmargin-sm">
                                @lang('professeur/partials/step4.presentYourselfToStudent') <br>

                                <ul class="form-inputs-informations topmargin-sm">
                                    <li>@lang('professeur/partials/step4.howAreYouDifferent')</li>
                                    <li>@lang('professeur/partials/step4.lessonLayout')</li>
                                </ul>
                            </div>

                            <?php $presentation = isset($advert) ? $advert->presentation : null; ?>

                            {!! Form::textarea('presentation',$presentation,['class' => 'sm-form-control', 'id' => 'presentation',
                            'required' => "required",
                            'data-parsley-required-message'=>__('professeur/partials/step4.requiredField'),
                            'data-parsley-minimumwords' => "20",
                            'title' => __('professeur/partials/step4.minimum20Words')]) !!}
                            <p id="presentation-text"><span id="presentation-count">20</span> @lang('professeur/partials/step4.missingWordsDesc')
                            </p>

                        </div>

                        <div class="bottommargin-sm" id="experience">


                            {!! Form::label('content',__('professeur/partials/step4.yourExperience')) !!}
                            <div class="leftmargin-sm">
                                <ul class="form-inputs-informations">

                                    <li>@lang('professeur/partials/step4.howLongHaveYouTaught')</li>
                                    <li>@lang('professeur/partials/step4.detailExperience')</li>
                                </ul>
                            </div>
                            <?php $content = isset($advert) ? $advert->content : null; ?>
                            {!! Form::textarea('content',$content,['class' => 'sm-form-control', 'id' => 'content']) !!}

                            <em class="small ">@lang('professeur/partials/step4.privacyClause')</em>
                        </div>

                        <div class="tab-content" id="education">

                            {!! Form::label('experience',__('professeur/partials/step4.yourCV')) !!}
                            <div class="leftmargin-sm">

                                <ul class="form-inputs-informations">
                                    <li>@lang('professeur/partials/step4.yourDegrees')</li>
                                    <li>@lang('professeur/partials/step4.yourHobbies')</li>
                                    <li>@lang('professeur/partials/step4.yourAnecdote')</li>
                                </ul>
                            </div>
                            <?php $experience = isset($advert) ? $advert->experience : null; ?>

                            {!! Form::textarea('experience', $experience,['class' => 'sm-form-control', 'id' => 'experience']) !!}

                            <em class="small">@lang('professeur/partials/step4.privacyClause')</em>
                        </div>
                    </div>
                    <p class="form-inputs-informations small col-md-8 col-md-offset-2 topmargin-small">
@lang('professeur/partials/step4.writingAdvice')
                        <br>
                        <br>
                         {{--<em  style="color: indianred"><i class="fa fa-info-circle fa-2x"></i> Veuillez ne pas inclure vos nom de famille, numéro de téléphone et   e-mail.--}}
                             {{--<br> (Dans le cas contraire l'annonce ne sera pas validée par la modération.)</em>--}}
                    </p>
                </div>


                <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                    <div class="bs-callout bs-callout-warning col-md-6 col-md-offset-3 alert alert-danger hidden">
                        <h4>@lang('professeur/partials/step4.missingFields')</h4>
                        <strong>@lang('professeur/partials/step4.pleaseCompleteMandatoryFields')</strong>
                    </div>
                    <button type="submit" class="button button-3d button-large button-rounded" id="submitStep4">
                        @lang('professeur/partials/step4.iHaveDefinedMyDesc')
                    </button>
                </div>

                {!! Form::close() !!}

    {!! HTML::script("js/step4.js")!!}

</div>