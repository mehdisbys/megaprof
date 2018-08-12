@extends('layouts.__master')

@section('content')
    {!! HTML::style("css/jquery-ui.css") !!}
    {!! HTML::style('css/fa/css/font-awesome.min.css')!!}
    {!! HTML::style('css/ratings.css')!!}

    {!! HTML::script("js/jquery-ui.js")!!}

    @include('includes.inputErrors')
    <div class="col-md-8 col-md-offset-3">

        <form id="comment-form" accept-charset="UTF-8"
              action="/laisser-un-commentaire" method="POST" data-parsley-validate>
            {!! csrf_field() !!}
            {!! Form::hidden('comment_id', $comment->id) !!}

            <div class="col-md-10 bold ">

                @lang('comments/form.title') {{$comment->targetUser->firstname}} ?

                {!! Form::textarea('comment',null,['class' => 'sm-form-control', 'id' => 'presentation',
                'required' => "required",
                'data-parsley-required-message'=>__('comments/form.requiredField'),
                'data-parsley-minimumwords' => "10",
                'Placeholder' => __('comments/form.describeLesson'),
                'title' => __('comments/form.minimumWords')]) !!}
            </div>

            <div class="col-md-10 topmargin-sm">{{ __('comments/form.rateTeacher', ['name' => $comment->targetUser->firstname])}}
            </div>

            <div class="col-md-offset-1 col-md-8 star-rating ratingsm rating-active topmargin-sm">

                <fieldset>
                    <span class="col-md-1">@lang('comments/form.rateBad')</span>
                    <div class="rating col-md-8">
                        <input type="radio" id="star5" name="rating" value="5"/>
                        <label class="full" for="star5"
                               title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5"/>
                        <label class="half"
                               for="star4half"
                               title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4"/><label class="full" for="star4"
                                                                                       title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3.5"/>
                        <label class="half"
                               for="star3half"
                               title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3"/><label class="full" for="star3"
                                                                                       title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2.5"/>
                        <label class="half"
                               for="star2half"
                               title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2"/><label class="full" for="star2"
                                                                                       title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1.5"/>
                        <label class="half"
                               for="star1half"
                               title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1"/><label class="full" for="star1"
                                                                                       title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half"/>
                        <label class="half" for="starhalf"
                               title="Sucks big time - 0.5 stars"></label>
                    </div>
                    <span class="col-md-2">@lang('comments/form.rateGood')</span>
                </fieldset>
            </div>
            <div class="col-md-8 col-md-offset-1 text-center topmargin-sm">
                <button type="submit" class="button button-3d button-large button-rounded button-green">
@lang('comments/form.postComment)
                </button>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>

@endsection