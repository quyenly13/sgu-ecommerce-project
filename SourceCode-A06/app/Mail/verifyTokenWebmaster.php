<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Quantrivien;
class verifyTokenWebmaster extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $quantrivien;
    public function __construct(Quantrivien $qtr)
    {
       $this->quantrivien = $qtr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('KÍCH HOẠT TÀI KHOẢN')->markdown('emails.webmaster.verifytoken');
    }
}
