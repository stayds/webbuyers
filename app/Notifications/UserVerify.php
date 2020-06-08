<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;


class UserVerify extends Notification
{
    //use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public static $toMailCallback;

    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }
        return (new MailMessage)
            ->subject('Verify Email Address')
            ->greeting('Congratulations!')
            ->line(Lang::getFromJson('Welcome to the Bulk Buyers Connect family… Your best shopping experience starts here.'))
            ->line(Lang::getFromJson('Thank you for joining our community. Our goal is to help you reduce your monthly household spending budget by getting you the best possible deals for the best quality.'))
            ->line(Lang::getFromJson('When you order with us your products are delivered to you absolutely FREE! Orders are delivered on Fridays and Saturdays only. Deliveries are done weekly on Fridays and Saturdays. All orders made on or before Wednesday of every week will be delivered on Friday/Saturday of the same week while any order after Wednesday will be delivered on Friday/Saturday of the following week.'))
            ->line(Lang::getFromJson('As a member of the BBC, you will be able to plan your monthly spending in a way that maximises the advantages of buying things in bulk as a member of our group, so in other words you get retail quantities but at bulk prices.'))
            ->line(Lang::getFromJson('Please click the button below to verify your email address.'))
            ->action(Lang::getFromJson('Verify Email Address'), $verificationUrl);

    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->getKey()]
        );
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
