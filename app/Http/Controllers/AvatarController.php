<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Avatar;

class AvatarController extends Controller
{
    public function getAvatar($user_id)
    {
        return Avatar::getAvatar($user_id);
    }

    public function getDefaultAvatar($user_id)
    {
        return Avatar::getDashboardAvatar($user_id);
    }
}
