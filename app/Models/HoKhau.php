<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoKhau extends Model
{
    protected $table='ho_khau';
    protected $primarykey='id';
    protected $fillable=['hk_cd','chu_ho_id','dia_chi','ngay_cap'];
    public function nhankhau()
    {
        return $this->hasmany('App\Models\NhanKhau','hk_id');
    }

    
}
