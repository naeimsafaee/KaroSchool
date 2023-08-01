<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CodeEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function build() {

        return $this->subject("کد تایید کارو اسکول")->from($address = 'info@karo.school' , $name = 'کارو اسکول')
            ->view('mail.code_email', [
                'data' => [
                    "message" => $this->link
                ],
            ])->withSwiftMessage(function ($message) {
                $message->getHeaders()
                    ->addTextHeader('List-Unsubscribe', 'https://karo.school/unsubscribe');
            });
    }
}
