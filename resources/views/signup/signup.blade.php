@extends('layouts.master')

@section('custom-head')
  <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
@include('includes.inputErrors')
  <div class="wrapper">
    <div class="register-form">
      <h2 class="register-step-title">Créer un compte Taelam</h2>
      <p class="register-step-subtitle">Pour rencontrer des professeurs et des élèves formidables</p>
      <form role="form" method="POST" action="/inscription" class="component-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-wrapper">
          <a class="facebook-connect" style="display:block" data-href="#"
            href="redirect">
            Inscription avec Facebook
          </a>
          <span class="text-separator">ou</span>
          <div class="input-text input-container">
            <input type="text" required="required" placeholder="Prénom" name="firstname" class="input" value="{{$firstname ?? ''}}" />
          </div>
          <div class="input-text input-container">
            <input type="text" required="required" placeholder="Nom" name="lastname" class="input" value="{{$lastname ?? ''}}" />
          </div>
          <div class="input-text input-container">
            <input type="email" placeholder="Email" name="email" class="input" value="{{$email ?? ''}}" />
          </div>
          <div class="input-text input-container">
            <input type="password" required="required" placeholder="Mot de passe" name="password" class="input" value="" />
          </div>
          <div class="input-text input-container">
            <input type="password" required="required" placeholder="Confirmation mot de passe" name="password_confirmation" class="input" value="" />
          </div>

          <div class="g-recaptcha topmargin-sm" data-sitekey="6LfJ2xsUAAAAACPgk0dN3HNLY1p_3vS0_s1964mU"></div>


          <input type="submit" value="S'inscrire" class="button topmargin-sm" id="submit-btn-register"/>
          <p class="register-member">Déjà membre Taelam ?
            <a href="login" class="register-member-link register-switch-panel">Connexion</a>
          </p>
        </div>
      </form>
    </div>
  </div>

@endsection
