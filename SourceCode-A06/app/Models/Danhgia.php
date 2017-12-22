<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Danhgia extends Model
{
    protected $table = "danh_gia";

    public function merchant() {
        return $this->belongsTo('App\Models\Merchant', 'id_m', 'id_m');
    }
    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'id_c', 'id_c');
    }

}
