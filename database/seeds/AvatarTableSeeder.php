<?php

use Illuminate\Database\Seeder;


class AvatarTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('avatar')->delete();

        $userIds = array_pluck(\App\Models\User::all(['id'])->toArray(), 'id');

        $avatars = \File::allFiles('./public/images/sample-avatars');

        $length = count($avatars);

        if($length == 0) {
            throw new RuntimeException('There are no avatar images in the specified folder');
        }

        foreach ($userIds as $userId) {
            /** @var SplFileInfo $avatar */
            $avatar             = $avatars[random_int(0, $length -1)];
            $model              = new \App\Models\Avatar();
            $model->img         = file_get_contents($avatar->getPathname());
            $model->img_cropped = $model->img;
            $model->img_name    = $avatar->getFilename();
            $model->img_size    = $avatar->getSize();
            $model->img_mime    = \Intervention\Image\Facades\Image::make($avatar->getPathname())->mime();
            $model->user_id     = $userId;
            $model->save();
        }


    }


}