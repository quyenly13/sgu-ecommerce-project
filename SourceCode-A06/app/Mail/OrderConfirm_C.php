<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Hoadon;
use App\Models\CT_Hoadon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirm_C extends Mailable
{
    use Queueable, SerializesModels;

    public $ho_ten;
    public $hd;
    public $ct_hd;

    public $subject = 'ĐẶT HÀNG THÀNH CÔNG ! ';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ho_ten,Hoadon $hd,$ct_hd )
    {
        $this->ho_ten = $ho_ten;
        $this->hd = $hd;
        $this->ct_hd = $ct_hd;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->markdown('emails.customer.ordercomplete')->with(['ho_ten'=>$this->ho_ten,'hd'=>$this->hd,'ct_hd'=>$this->ct_hd]);
    }
}
