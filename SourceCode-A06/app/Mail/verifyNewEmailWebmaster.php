<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Quantrivien;
class verifyNewEmailWebmaster extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $quantrivien;
    public function __construct(Quantrivien $qtr,$new_email)
    {
       $this->quantrivien = $qtr;
       $this->new_email = $new_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('KÍCH HOẠT EMAIL MỚI')->markdown('emails.webmaster.verifynewEmail')->with(['new_email'=>$this->new_email]);
    }
}
