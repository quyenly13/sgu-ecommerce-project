<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\CT_Hoadon;
use App\Models\Merchant;
use Illuminate\Support\Facades\Crypt;
class ratingMechant extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $tonghd;
     public $Merchant;
     public $lst_cthd;
     public $id_hd;
    public function __construct($id_hd,$lst_cthd,$tonghd,$id_c,Merchant $Merchant)
    {
        //
        $this->tonghd = $tonghd;
         $this->Merchant = $Merchant;
        $this->id_c= $id_c;
        $this->lst_cthd = $lst_cthd;
        $this->id_hd =  Crypt::encryptString($id_hd);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('ĐÁNH GIÁ NGƯỜI BÁN')->markdown('emails.merchant.ratingmerchant')->with(['id_hd'=>$this->id_hd,'lst_cthd'=>$this->lst_cthd,'tonghd'=>$this->tonghd,'id_c'=>$this->id_c,'merchant'=>$this->Merchant]);
    }
}
