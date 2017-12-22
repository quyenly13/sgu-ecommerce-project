<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $subject = 'XÁC NHẬN TÀI KHOẢN TOYS WORLD';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $user)
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
        return $this->markdown('emails.registerC')->with(['user'=>$this->user]);
    }
}
