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
        DB::table('ho_khau')->insert([
            ['hk_cd'=>'1','chu_ho_id'=>'1','dia_chi'=>'hcm','ngay_cap'=>date('y-m-d')],
            ['hk_cd'=>'2','chu_ho_id'=>'2','dia_chi'=>'can tho','ngay_cap'=>date('y-m-d')],
            ['hk_cd'=>'3','chu_ho_id'=>'3','dia_chi'=>'hcm','ngay_cap'=>date('y-m-d')],
        ]);
    }
}
