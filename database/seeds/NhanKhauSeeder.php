<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanKhauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('nhan_khau')->insert([
        ['ho_ten'=>'vu','hk_id'=>'1','user'=>'lamvuvu44@gmail.com','password'=>bcrypt('12345678'),'ngay_sinh'=>date('2000-01-01'),'ngay_mat'=>date('y-m-d'),'gioi_tinh'=>'nam','quan_he'=>'con','email'=>'vu12334@gmail','sdt'=>'0374885769','ngay_nhap_khau'=>date('y-m-d')],
        ['ho_ten'=>'minh','hk_id'=>'2','user'=>'lamvuvu45@gmail.com','password'=>bcrypt('12345678'),'ngay_sinh'=>date('2000-01-01'),'ngay_mat'=>date('y-m-d'),'gioi_tinh'=>'nam','quan_he'=>'con','email'=>'minh12334@gmail','sdt'=>'0374885769','ngay_nhap_khau'=>date('y-m-d')],
        ['ho_ten'=>'tuan','hk_id'=>'3','user'=>'lamvuvu46@gmail.com','password'=>bcrypt('12345678'),'ngay_sinh'=>date('2000-01-01'),'ngay_mat'=>date('y-m-d'),'gioi_tinh'=>'nam','quan_he'=>'con','email'=>'tuan12334@gmail','sdt'=>'0374885769','ngay_nhap_khau'=>date('y-m-d')],
        ['ho_ten'=>'hoang','hk_id'=>'1','user'=>'lamvuvu47@gmail.com','password'=>bcrypt('12345678'),'ngay_sinh'=>date('2000-01-01'),'ngay_mat'=>date('y-m-d'),'gioi_tinh'=>'nam','quan_he'=>'con','email'=>'hoang12334@gmail','sdt'=>'0374885769','ngay_nhap_khau'=>date('y-m-d')],
       ]);
    }
}
