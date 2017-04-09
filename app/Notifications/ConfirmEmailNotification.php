<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;

class ConfirmEmailNotification extends Notification
{
    use Queueable;
    /**
     * @var User
     */
    private $user;
    /**
     * @var JWTInterface
     */
    private $jwt;

    /**
     * ConfirmEmailNotification constructor.
     * @param User $user
     * @param JWTInterface $jwt
     */
    public function __construct(User $user, JWTInterface $jwt)
    {

        $this->user = $user;
        $this->jwt = $jwt;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $token = $this->jwt->encode([
            'email' => $this->user->email
        ]);

        $action = route('auth.confirmation.confirm', [
            'token' => $token,
        ]);

        return (new MailMessage)
            ->success()
            ->line('Подтвердите свой Email')
            ->action('Подтвердить', $action)
            ->line('Спасибо, что остаётесь с нами!');
    }
}