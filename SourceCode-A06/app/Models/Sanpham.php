<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = "san_pham";

    public function danhmuc() {
        return $this->belongsTo('App\Models\Danhmuc', 'ma_danh_muc', 'id');
    }

    public function ct_hoadon() {
        return $this->hasMany('App\Models\CT_Hoadon', 'id_sp', 'id');
    }
}
