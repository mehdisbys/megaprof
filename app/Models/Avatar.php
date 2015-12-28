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

    public function cropAvatar($name, array $c)
    {
        $cropped = \Image::make(\Request::file($name));

        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        $cropped->resize(null, 624, function ($constraint) {
            $constraint->aspectRatio();
        });

        $cropped->crop($c['w'], $c['h'], $c['x'], $c['y']);

        if($cropped)
        {
            $this->img_cropped = $cropped->encode('png');

        }
    }
}