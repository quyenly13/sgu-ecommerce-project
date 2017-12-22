<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cart;

class Hoadon extends Model
{
    protected $table = "hoa_don";
    protected $fillable = ['id_c', 'dia_chi', 'ghi_chu_KH', 'SDT', 'trang_thai', 'tong_tien'];

    public function ct_hoa_don(){
        return $this->hasMany('App\Models\CT_Hoadon', 'id_hd', 'id');
    }

    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'id_c', 'id_c');
    }
}
