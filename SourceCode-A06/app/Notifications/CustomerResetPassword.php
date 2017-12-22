<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerResetPassword extends Notification
{
    use Queueable;

   public $token;
   public $username;
   public $email;
 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email, $username)
    {
        $this->token = $token;
        $this->email = $email;
        $this->ten_dang_nhap = $username;
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
        return (new MailMessage)
                    ->subject('THIẾT LẬP LẠI MẬT KHẨU')
                    ->greeting('Xin chào '.$this->ten_dang_nhap.',')
                    ->line('Bạn quên mật khẩu? Bấm vào nút dưới đây để thiết lập lại mật khẩu:')
                    ->action('Thiết lập lại mật khẩu', route('customer.newPassword', ['token' => $this->token, 'email' => $this->email]));
                    
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
