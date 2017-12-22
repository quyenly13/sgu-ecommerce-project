<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerRegister extends Notification
{
    use Queueable;
    public $username;
    public $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $username)
    {
        $this->ten_dang_nhap = $username;
        $this->email = $email;
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
                    ->subject('XÁC NHẬN TÀI KHOẢN TOYS WORLD')
                    ->greeting('Xin chào '.$this->ten_dang_nhap.',')
                    ->line('Chào mừng bạn đến với Toys World. Bạn đã đăng kí thành công tài khoản tại Toys World. Nhấn vào nút dưới đây để truy cập:')
                    ->action('Toys World', url('/'))
                    ->line('Cảm ơn bạn đã sử dụng trang web của chúng tôi!');
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
