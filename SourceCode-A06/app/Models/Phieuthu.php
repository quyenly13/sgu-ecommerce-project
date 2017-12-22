<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phieuthu extends Model
{
    protected $table = "phieu_thu";

    public function ct_phieu_thu(){
        return $this->hasMany('App\Models\CT_Phieuthu', 'id_pt', 'id');
    }
    public function merchant(){
        return $this->belongsTo('App\Models\Merchant', 'id_m', 'id_m');
    }
    public function goitin(){
        return $this->belongsTo('App\Models\Goitin', 'id_goitin', 'id');
    }
}
