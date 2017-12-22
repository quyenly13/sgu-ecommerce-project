<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_Hoadon extends Model
{
    protected $table = "ct_hoa_don";

    public function sanpham() {
        return $this->belongsTo('App\Models\Sanpham', 'id_sp', 'id');
    }

    public function hoadon(){
        return $this->belongsTo('App\Models\Hoadon', 'id_hd', 'id');
    }
    public function merchant(){
        return $this->belongsTo('App\Models\Merchant', 'id_m', 'id_m');
    }
    public function checkStatus($stt)
    {
        switch ($stt) {
            case 0:
                return 'Đang chờ xử lý';
                break;
            case 1:
            return 'Đang giao';
                break;
            case 2:
            return 'Hoàn tất';
                break;
            case 3:
            return 'Đã hủy';
            default:
            return '';
        }
    }

}
