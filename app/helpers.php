<?php

/**
 * Set a flash message in the session.
 *
 * @param  string $type
 * @param  string $message
 * @return void
 */
function __message($type, $message)
{
	session()->flash($type,$message);
}

function flashMessage($message)
{
	__message('message', $message);
}

function thanks($message)
{
	__message('thanks_message', $message);
}

function error($message)
{
	__message('error_message', $message);
}

function info_message($message)
{
	__message('info_message', $message);
}

function get_expiry_date($days=NULL)
{
	$days = $days ? : Config::get('config.days_before_expiry');

	return Carbon::now()->addDays($days);
}

function getModelColumns($model)
{
	return \DB::connection()->getSchemaBuilder()->getColumnListing($model);
}

function prepareFileUpload($path)
{
	TestCase::assertFileExists($path);

	$finfo = finfo_open(FILEINFO_MIME_TYPE);

	$mime = finfo_file($finfo, $path);

	return new \Symfony\Component\HttpFoundation\File\UploadedFile($path, null, $mime, null, null, true);
}

function issetAndHasValue($var = NULL, $value = true)
{
    return isset($var) and $var == $value;
}

function calculate_next_time($interval, $start_time = NULL)
{
	$start_time = $start_time ?: time();

	return $start_time + $interval;
}

function savePicture($type = 'advert')
{
	$coord = \Request::only(['w','h','x','y','r']);

	if($type == 'advert') {
        $m = \App\Models\Avatar::firstOrCreate(['user_id' => \Auth::id()]);
    }
    else
    {
        $m = \App\Models\Avatar::firstOrCreate(['user_id' => \Auth::id(), 'type' => 'dashboard']);
    }

	$webcam = \Request::file('img_upload') ? false : true;

	if(! $webcam)
	{
		$filename = 'img_upload';
		$m->handleFile($filename);
		$m->cropAvatar($filename, $coord);
	}

	else
	{
		$filename ='webcam_img';
		$m->cropAvatar($filename, $coord, true);
	}
	$m->save();
}

function emailConfig(\App\Models\User $user, $subject)
{
	$config['to']       = $user->email;
	$config['name']     = $user->firstname;
	$config['subject']  = ucfirst($user->firstname) . ' ' . $subject;
	$all['name']        = $user->firstname;

	return [$all, $config];
}

function getAvatar($userId)
{
	return "/avatar/{$userId}";
}

function saveCaptchaCode(string $code)
{
    session(['captchaCode' => $code]);
}

function isCaptchaCodeCorrect(string $codeToValidate)
{
    $code = session('captchaCode');

    return $code === $codeToValidate;
}
