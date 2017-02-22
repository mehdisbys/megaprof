@extends('layouts.__master')

@section('content')


    <h1>Pièces d'identité en attente de validation</h1>
    <div class="col-md-10 topmargin-lg" id="content">

        @include('includes.success')
    @foreach($docs as $doc)

            <div class="row border1px bottommargin-sm">

                <div class="col-md-3">
                    {{$doc->user->firstname}} {{$doc->user->lastname}}
                </div>

                <div class="col-md-3">
                    {{$doc->user->email}}
                </div>

                <div class="col-md-3">
                    <a  href="/download-id/{{$doc->id}}"><i class="icon icon-download"></i> Télécharger la pièce d'identité</a>
                </div>

                <div class="col-md-2 pull-right">

                    <a class="button-green btn btn-success"
                       href="/validate-user-identification/{{$doc->id}}">Valider</a>
                </div>

                <div class="col-md-3">
                    Envoyé : {{$doc->created_at->diffForHumans()}}
                </div>


            </div>
        @endforeach

        @if($docs->count() == 0)
            <div class="col-md-12">Pas de pièce d'identité à valider</div>
        @endif

    </div>
@endsection

