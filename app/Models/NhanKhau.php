<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanKhau extends Authenticatable
{
    
    use Notifiable;


    protected $table='nhan_khau';
    protected $primarykey='id';
    protected $fillable=['HK_ID','user','password','Ho_Ten','Hinh_Anh','Ngay_Sinh','Ngay_Mat','Gioi_Tinh','Quan_He','Email','SDT','Ngay_Nhap_Khau'];

}
