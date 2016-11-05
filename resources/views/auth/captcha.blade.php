<div id="captcha" class="input-container">
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