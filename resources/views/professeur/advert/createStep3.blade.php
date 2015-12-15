@extends('layouts.master')

@section('content')

    {!!  HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;') !!}
    {!!  HTML::script('js/jquery.geocomplete.min.js',[])  !!}


    {!! Form::open(['url' => '/nouvelle-annonce-2']) !!}

    <div class="col-md-6 col-md-offset-3">


        <h2>Lieux des cours et Modalités</h2>

        <label for='location' class="topmargin-sm">Où se dérouleront vos cours ?</label>
        {!! Form::input('text','location',null,['class' => 'alert_location sm-form-control', 'id' => 'location']) !!}

        <script>
            $("#location").geocomplete();
        </script>

        <div class="ck-button col-md-12 col-md-offset-2">
            {!! Form::input('checkbox','can_receive',null,['class' => 'no-display', 'id' => 'can_receive']) !!}
            <label for='can_receive' class="topmargin-sm">
                <span>Je peux recevoir mes élèves</span>
            </label>
        </div>

        <div class="ck-button col-md-12 col-md-offset-2">
            {!! Form::input('checkbox','can_travel',null,['class' => 'no-display', 'id' => 'can_travel']) !!}
            <label for='can_travel' class="topmargin-sm">
                <span>Je peux me déplacer</span>
            </label>
        </div>

        <div class="ck-button col-md-12 col-md-offset-2">
            {!! Form::input('checkbox','can_webcam',null,['class' => 'no-display', 'id' => 'can_webcam']) !!}
            <label for='can_webcam' class="topmargin-sm">
                <span>Je peux donner des cours par webcam</span>
            </label>
        </div>

    </div>

    <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
        <button type="submit" class="button button-3d button-large button-rounded button-green">
            J'ai défini où se dérouleront mes cours
        </button>
    </div>

    {!! Form::close() !!}
@endsection