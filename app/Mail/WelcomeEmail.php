<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $text = "Добро пожаловать в наше приложение, " . $this->user->name . "!\nСпасибо за регистрацию!";

        return $this->subject('Тема: Добро пожаловать!')
            ->text('emails.welcome', ['text' => $text]);
    }
}
