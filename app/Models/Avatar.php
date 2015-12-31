<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{

    protected $table = 'avatar';

    protected $guarded = [];


    public function handleFile($name)
    {
        $img = \Request::file($name);

        if($img)
        {
            $this->img      = file_get_contents($img->getRealPath());
            $this->img_name = $img->getClientOriginalName();
            $this->img_mime = $img->getMimeType();
            $this->img_size = $img->getSize();
        }
    }

    public function cropAvatar($name, array $c, $webcam = false)
    {
        if($webcam)
        {
            $filename = "webcam_avatar/webcam_" . time() . '.jpg';

            file_put_contents('webcam_avatar/webcam_' . time() . '.jpg', base64_decode($_POST[$name]));

            $this->img_cropped = \Image::make($filename)->resize(190, 190);

            return $this->img_cropped->response();
        }

        $cropped =  \Image::make(\Request::file($name));

        $cropped->rotate(-$c['r']);

        $cropped->crop(round($c['w']), round($c['h']), round($c['x']), round($c['y']));

        $cropped->resize(190,190);

        $this->img_cropped = $cropped->encode('png');
    }
}