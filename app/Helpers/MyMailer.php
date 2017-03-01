<?php namespace App\Helpers;

use App\Helpers\Contracts\MailerContract;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MyMailer implements MailerContract
{
    //trivial
    protected $redirectQueuetoSend;

    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client              = $client;
        $this->redirectQueuetoSend = env('MAIL_DISABLE_QUEUING_OVH', true);

    }

    public function queueMail($view, $data, $config, $queue = NULL)
    {
        if ($this->redirectQueuetoSend) {
            Log::info("Mail going to: " . json_encode($config));
            Log::info("Instead of queuing email, we will send it directly");
            return $this->sendMail($view, $data, $config);
        }
        try {
            $callback = $this->__mail($config);

            Mail::queue($view, $data, $callback);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

    }

    public function sendMail($view, $data, $config)
    {
        try {
            $callback = $this->__mail($config);

            Log::info("Mail going to: " . json_encode($config));

//            $html = view($view)->with($data)->render();
//
//
//            $this->client->post('https://api.sparkpost.com/api/v1/transmissions', [
//                'headers' => [
//                    'Authorization' => env('SPARKPOST_KEY'),
//                ],
//                'json'    => [
//                    'recipients' => [['address' => ['email' => $config['to']]]],
//                    'content'    => [
//                        'from' => [
//                            'name'  => 'Taelam',
//                            'email' => 'noreply@taelam.com',
//                        ],
//
//                        'subject' => $config['subject'],
//                        'html'    => $html,
//                    ],
//                ],
//                'options' => [
//                    'open_tracking'  => false,
//                    'click_tracking' => false,
//                    'transactional'  => true,
//                ],
//            ]);

            Mail::send($view, $data, $callback);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    private function __mail($config)
    {
        return function ($message) use ($config) {

            $message->to($config['to'], $config['name'])
                ->subject($config['subject']);

            if (isset($config['has_cv']) and $config['has_cv']) {
                $message->attach($config['cv_path'],
                                 ['as'   => $config['as'],
                                  'mime' => $config['mime'],
                                 ]
                );
            }
        };
    }
}
