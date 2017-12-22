<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taikhoanbikhoa extends Model
{
    protected $table = "tai_khoan_bi_khoa";

    public function merchant(){
        return $this->HasOne('App\Models\Merchant', 'id_m', 'id_m');
    }

    public function qtvien(){
        return $this->belongsTo('App\Models\Quantrivien', 'id_w', 'id_w');
    }
}
