<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Merchant;
class verifyToken extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $merchant;
    public function __construct(Merchant $merchant)
    {
       $this->merchant = $merchant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('KÍCH HOẠT TÀI KHOẢN')->markdown('emails.merchant.verifytoken');
    }
}
