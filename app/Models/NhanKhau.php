<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanKhau extends Model
{
    protected $table='nhankhau';
    protected $primarykey='ID';
    protected $fillable=['Ho_Ten','Ngay_Sinh','Ngay_Mat','Gioi_Tinh','Quan_He','Email','SDT','Ngay_nhap_Khau'];
}
