<?php

use Illuminate\Database\Seeder;

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
        ['Ho_Ten'=>'Vu','HK_ID'=>'1','Ngay_Sinh'=>date('2000-01-01'),'Ngay_Mat'=>date('Y-m-d'),'Gioi_Tinh'=>'Nam','Quan_He'=>'Con','Email'=>'vu12334@gmail','SDT'=>'0374885769','Ngay_nhap_Khau'=>date('Y-m-d')],
        ['Ho_Ten'=>'Minh','HK_ID'=>'1','Ngay_Sinh'=>date('2000-01-01'),'Ngay_Mat'=>date('Y-m-d'),'Gioi_Tinh'=>'Nam','Quan_He'=>'Con','Email'=>'Minh12334@gmail','SDT'=>'0374885769','Ngay_nhap_Khau'=>date('Y-m-d')],
        ['Ho_Ten'=>'Tuan','HK_ID'=>'1','Ngay_Sinh'=>date('2000-01-01'),'Ngay_Mat'=>date('Y-m-d'),'Gioi_Tinh'=>'Nam','Quan_He'=>'Con','Email'=>'Tuan12334@gmail','SDT'=>'0374885769','Ngay_nhap_Khau'=>date('Y-m-d')],
        ['Ho_Ten'=>'Hoang','HK_ID'=>'1','Ngay_Sinh'=>date('2000-01-01'),'Ngay_Mat'=>date('Y-m-d'),'Gioi_Tinh'=>'Nam','Quan_He'=>'Con','Email'=>'Hoang12334@gmail','SDT'=>'0374885769','Ngay_nhap_Khau'=>date('Y-m-d')],
       ]);
    }
}
