<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoKhau extends Model
{
    protected $table='ho_khau';
    protected $primaryKey='ID';
    protected $fillable=['HK_CD','Chu_Ho_ID','Dia_Chi','Ngay_Cap'];
    public function nhankhau()
    {
        return $this->hasMany('App\Models\NhanKhau','HK_ID');
    }

}
