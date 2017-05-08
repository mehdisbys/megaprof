    <div class="wrapper">
        <div class="connection-form">
            <h1 class="register-step-title">Se connecter</h1>
            <form id="loginForm" role="form" method="POST" action="/login" class="component-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-wrapper">
                    <a class="facebook-connect" href="redirect">Connexion avec Facebook</a>
                    <span class="text-separator">ou</span>
                    <div class="input-text input-container">
                        <input type="email" data-type="email" placeholder="Email" required="" name="email" class="input"
                               value="{{ $email or '' }}"/>
                    </div>

                    <div class="input-text input-container">
                        <input type="password" data-type="required"  required="" placeholder="Mot de passe" name="password"
                               class="input" value=""/>
                    </div>

                    <div class="g-recaptcha topmargin-sm" data-sitekey="6LfJ2xsUAAAAACPgk0dN3HNLY1p_3vS0_s1964mU" data-callback="submitForm"></div>

                    <input type="submit" value="Se connecter" class="button topmargin-sm"/>
                    <p class="register-member">Pas encore membre ?
                        <a href="/inscription" class="register-member-link register-switch-panel">S'inscrire</a>
                    </p>
                </div>
            </form>
            <a href="/reset_password">Mot de passe oublié ?</a>
        </div>
    </div>


    <script>
        function submitForm(response)
        {
            $('#loginForm').submit();
        }
    </script>