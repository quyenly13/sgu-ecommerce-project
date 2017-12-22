<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MerchantResetPassword;
class Merchant extends Authenticatable
{
    use Notifiable;
    protected $guard ='merchant';

    protected $table = "merchant";
    protected $primaryKey = 'id_m';
    protected $fillable = ['ten_dang_nhap', 'email', 'mat_khau','ho_ten','gioi_tinh','anh_dai_dien','sdt','dia_chi','so_tk','so_cmnd','so_luong_tin','trang_thai'];
    public function setMatKhauAttribute($password)
    {
        return $this->attributes['mat_khau'] = bcrypt($password);
    }
    public function getAuthPassword()
    {
        return $this->attributes['mat_khau'];
    }
    public function danhgia(){
        return $this->hasMany('App\Models\Danhgia', 'id_m', 'id_m');
    }

    public function phieuthu(){
        return $this->hasMany('App\Models\Phieuthu', 'id_m', 'id_m');
    }

    public function sanpham(){
        return $this->hasMany('App\Models\SanPham', 'id_m', 'id_m');
    }
    protected $hidden = [
        'mat_khau', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MerchantResetPassword($token, $this->email, $this->ten_dang_nhap));
    }
}
