<div id="fb-root"></div>
<div class="section section-odd inscription-connexion">
    <div class="wrapper">
        <div class="register-column connection-form">
            <h1 class="register-step-title">Se connecter</h1>
            <form role="form" method="POST" action="/login" class="component-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-wrapper">
                    <a class="facebook-connect" href="redirect">Connexion avec Facebook</a>
                    <span class="text-separator">ou</span>
                    <div class="input-text input-container">
                        <input type="email" data-type="email" placeholder="Email" name="email" class="input"
                               value="{{ old('email') }}"/>
                        <span class="required-tooltip">Champ à renseigner</span>
                        <span class="error-tooltip">Email incorrect</span>
                    </div>

                    <div class="input-text input-container">
                        <input type="password" data-type="required" placeholder="Mot de passe" name="password"
                               class="input" value=""/>
                        <span class="required-tooltip">Champ à renseigner</span>
                        <span class="error-tooltip">Mot de passe incorrect</span>
                    </div>

                    <div id="captcha">
                        <?php
                        $builder = new \Gregwar\Captcha\CaptchaBuilder();
                        $builder->build();
                        saveCaptchaCode($builder->getPhrase());
                        ?>
                        <img class="captcha" src="{{$builder->inline()}}"/>
                    </div>

                    <div class="input-text input-container">
                        <input type="text" id="captcha-input" data-type="required" placeholder="Code de sécurité" name="captcha" class="input" value="">
                    </div>

                    <input type="submit" value="Se connecter" class="button"/>
                    <p class="register-member">Pas encore membre ?
                        <a href="/inscription" class="register-member-link register-switch-panel">S'inscrire</a>
                    </p>
                </div>
            </form>
            <a href="/reset_password">Mot de passe oublié ?</a>
        </div>
    </div>
</div>
