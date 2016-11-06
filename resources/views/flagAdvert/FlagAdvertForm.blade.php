@extends('layouts.master')
@section('content')

<div id="fb-root"></div>
<div class="section section-odd inscription-connexion">
    <div class="wrapper">
        <div class="connection-form">
            <h3 class="register-step-title">Signaler une annonce inappropriée</h3>
            <form role="form" method="POST" action="/signaler" class="component-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-section-separator">Titre de l'annonce : {{$advert->title}}</div>
                <div class="form-wrapper flag-advert">

                    <div class="input-text input-container">
                        <input type="email" data-type="email" placeholder="Votre email" name="email" class="input"
                               value="{{ old('email') }}"/>
                        <span class="required-tooltip">Champ à renseigner</span>
                        <span class="error-tooltip">Email incorrect</span>
                    </div>

                    <div class="input-text input-container">
                        <textarea data-type="required" placeholder="Pourquoi cette annonce vous semble innappropriée" name="message"
                               class="input" data-size="100" rows="6" cols="50"></textarea>
                        <span class="required-tooltip">Champ à renseigner</span>
                        <span class="error-tooltip">Mot de passe incorrect</span>
                    </div>

                    @include('auth.captcha')

                    <div class="input-text input-container">
                    <input type="submit" value="Envoyer" class="button"/>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>
@endsection
