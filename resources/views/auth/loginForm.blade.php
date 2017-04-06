    <div class="wrapper">
        <div class="connection-form">
            <h1 class="register-step-title">Se connecter</h1>
            <form role="form" method="POST" action="/login" class="component-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-wrapper">
                    <a class="facebook-connect" href="redirect">Connexion avec Facebook</a>
                    <span class="text-separator">ou</span>
                    <div class="input-text input-container">
                        <input type="email" data-type="email" placeholder="Email" name="email" class="input"
                               value="{{ $email or '' }}"/>
                        <span class="required-tooltip">Champ à renseigner</span>
                        <span class="error-tooltip">Email incorrect</span>
                    </div>

                    <div class="input-text input-container">
                        <input type="password" data-type="required" placeholder="Mot de passe" name="password"
                               class="input" value=""/>
                        <span class="required-tooltip">Champ à renseigner</span>
                        <span class="error-tooltip">Mot de passe incorrect</span>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LfJ2xsUAAAAACPgk0dN3HNLY1p_3vS0_s1964mU"></div>

                    <input type="submit" value="Se connecter" class="button"/>
                    <p class="register-member">Pas encore membre ?
                        <a href="/inscription" class="register-member-link register-switch-panel">S'inscrire</a>
                    </p>
                </div>
            </form>
            <a href="/reset_password">Mot de passe oublié ?</a>
        </div>
    </div>
