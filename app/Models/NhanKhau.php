<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanKhau extends Model
{
    protected $table='nhan_khau';
    protected $primarykey='ID';
    protected $fillable=['HK_ID','Ho_Ten','Hinh_Anh','Ngay_Sinh','Ngay_Mat','Gioi_Tinh','Quan_He','Email','SDT','Ngay_Nhap_Khau'];

}
