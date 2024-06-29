<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twilio\Twilio;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

class EmailNotification extends Notification
{
    use Queueable;
    protected $booking;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', TwilioChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Booking Created')
                    ->line('A new booking has been created by ' . $this->booking->user->fullname . '.')
                    ->line('Booking Details:')
                    ->line('User: ' . $this->booking->user->fullname)
                    ->line('Email: ' . $this->booking->user->email)
                    ->line('Service: ' . $this->booking->service->service_name)
                    ->line('Date: ' . $this->booking->book_date)
                    ->line('Please review the booking and take the necessary actions.')
                    ->line('Thank you for using our application!');
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
            'service' => $this->booking->service->service_name,
            'user' => $this->booking->user->username,
            'message' => 'menunggu konfirmasi'
        ];
    }

    public function toTwilio($notifiable)
    {
        return (new TwilioSmsMessage())
            ->content('Your booking request has been ' . $this->booking->status . '. ' .
                      'Service: ' . $this->booking->service->service_name . ', ' .
                      'Date: ' . $this->booking->book_date . ', ' .
                      'Thank you for using our application!');
    }
}
