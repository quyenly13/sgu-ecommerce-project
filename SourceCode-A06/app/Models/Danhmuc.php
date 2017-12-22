<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    protected $table = "danh_muc";
    protected $fillable = ['id', 'ten_danh_muc', 'mo_ta'];
    public function sanpham(){
        return $this->hasMany('App\Models\Sanpham', 'ma_danh_muc', 'id');
    }
}
