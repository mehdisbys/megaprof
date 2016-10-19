<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController
{


    public function generate()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        header('Content-type: image/jpeg');
    }
}