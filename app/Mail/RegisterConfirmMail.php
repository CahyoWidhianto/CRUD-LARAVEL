<?php


namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $userRegistered;

    public function __construct($user)
    {
        $this->userRegistered=$user;
    }

    public function build()
    {
        $data  = [
            'user' => $this->userRegistered
        ];
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('mail/register_mail')
            ->with($data);
    }
}
