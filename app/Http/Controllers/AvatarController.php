<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Avatar;
use Illuminate\Support\Facades\Input;

class AvatarController extends Controller
{
    public function getAvatar($user_id)
    {
        return Avatar::getAvatar($user_id);
    }

    public function getAdvertAvatar($user_id, $advert_id)
    {
        return Avatar::getAdvertAvatar($user_id, $advert_id);
    }

    public function getDefaultAvatar($user_id)
    {
        return Avatar::getDashboardAvatar($user_id);
    }

    public function saveAvatar()
    {
        $avatar = json_decode(Input::get('img_upload'));

        if ($avatar) {
            $output   = $avatar->output;
            $filename = '/tmp/'.str_random(10);
            base64_to_jpeg($output->image, $filename);

            $m              = \App\Models\Avatar::firstOrCreate(['user_id' => \Auth::id()]);
            $m->img         = file_get_contents($filename);
            $m->img_cropped = $m->img;
            $m->img_name    = $output->name;
            $m->img_mime    = $output->type;
            $m->img_size    = filesize($filename);
            $m->save();
        }

        thanks('Votre image de profil a été mise à jour');

        return redirect()->back();
    }
}
