<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Scopes\AuthorizedScope;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPassword;
use App\Notifications\CustomerRegister;


class Customer extends Authenticatable

{   use Notifiable;
    protected $guard = 'customer';
    protected $table = "customer";
    protected $primaryKey = "id_c";
    protected $fillable = ['ten_dang_nhap', 'email', 'password', 'anh_dai_dien', 'ho_ten', 'gioi_tinh', 'sdt', 'dia_chi'];

    public function hoadon(){
        return $this->hasMany('App\Models\Hoadon', 'id_c', 'id_c');
    }

    public function danhgia(){
        return $this->hasMany('App\Models\Danhgia', 'id_c', 'id_c');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPassword($token, $this->email, $this->ten_dang_nhap));
    }

    public function sendRegistertNotification($email, $username)
    {
        $this->notify(new CustomerRegister($email, $username));
    }

}
