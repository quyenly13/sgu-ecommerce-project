<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Quantrivien extends Authenticatable
{
    protected $table = "quan_tri_vien";
    protected $guard ='webmaster';
    protected $fillable = ['ten_dang_nhap', 'email', 'mat_khau','trang_thai'];
    public function getAuthPassword()
    {
        return $this->attributes['mat_khau'];
    }
    public function tkbikhoa(){
        return $this->hasMany('App\Models\Taikhoanbikhoa', 'id_w', 'id');
    }
}
