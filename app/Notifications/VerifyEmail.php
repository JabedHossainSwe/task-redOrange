<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
class VerifyEmail extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->line('Please click the button below to verify your email address.')
            ->action('Verify Email Address', $this->getEmailVerificationUrl($notifiable))
            ->line('Thank you for using our application!');
    }

    protected function getEmailVerificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)]
        );
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
