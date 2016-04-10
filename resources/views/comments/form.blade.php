@extends('layouts.__master')

@section('content')
    {!! HTML::style("css/jquery-ui.css") !!}
    {!! HTML::script("js/jquery-ui.js")!!}

    @include('includes.inputErrors')
    <div class="col-md-8 col-md-offset-3">

        <form id="comment-form" accept-charset="UTF-8"
              action="/laisser-un-commentaire" method="POST" data-parsley-validate>
            {!! csrf_field() !!}
            {!! Form::hidden('comment_id', $comment->id) !!}

            <div class="col-md-10 bold">

                    Comment s'est passé votre cours avec {{$comment->targetUser->firstname}} ?
                    Ce commentaire sera visible sur la page de votre annonce lorsque {{$comment->targetUser->firstname}} vous aura répondu.

                {!! Form::textarea('comment',null,['class' => 'sm-form-control', 'id' => 'presentation',
                'required' => "required",
                'data-parsley-required-message'=>"Ce champs est requis",
                'data-parsley-minimumwords' => "10",
                'Placeholder' => 'Décrivez le déroulement du cours en quelques mots',
                'title' => "Entrez au moins 10 mots"]) !!}
            </div>

            <div class="col-md-8 col-md-offset-1 text-center topmargin-sm">
                <button type="submit" class="button button-3d button-large button-rounded button-green">
                    Poster mon commentaire
                </button>
            </div>

    </div>
    <div class="clearfix"></div>

@endsection