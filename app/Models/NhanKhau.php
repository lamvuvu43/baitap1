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
    protected $fillable=['hk_id','user','password','ho_ten','hinh_anh','ngay_sinh','ngay_mat','gioi_tinh','quan_he','email','sdt','ngay_nhap_khau'];

}
