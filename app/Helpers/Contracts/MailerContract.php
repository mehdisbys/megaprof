<?php namespace App\Helpers\Contracts;


Interface MailerContract
{
	public function queueMail($view, $data, $config, $queue = NULL);

	public function sendMail($view, $data, $config);
}
