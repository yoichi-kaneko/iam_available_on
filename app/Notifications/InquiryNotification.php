<?php

namespace App\Notifications;

use Aws\Laravel\AwsFacade;

class InquiryNotification
{
    public static function send($data)
    {
        $message = view('notifications/inquiry')->with(['data' => $data])->render();
        $sns_client = AwsFacade::createClient('Sns');
        $sns_client->publish(
            [
                'Subject' => 'ユーザから問い合わせがありました',
                'TopicArn' => env('AWS_SNS_TOPIC_ARN'),
                'Message' => $message
            ]
        );
    }
}
