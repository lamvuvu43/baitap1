<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HoKhauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hokhau')->insert([
            ['HK_CD'=>'1','Chu_Ho_ID'=>'1','Dia_Chi'=>'HCM','Ngay_Cap'=>date('Y-m-d')],
            ['HK_CD'=>'2','Chu_Ho_ID'=>'3','Dia_Chi'=>'Can Tho','Ngay_Cap'=>date('Y-m-d')],
            ['HK_CD'=>'3','Chu_Ho_ID'=>'2','Dia_Chi'=>'HCM','Ngay_Cap'=>date('Y-m-d')],
        ]);
    }
}
