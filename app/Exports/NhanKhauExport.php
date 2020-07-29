<?php

namespace App\Exports;

use App\Models\NhanKhau;
use Maatwebsite\Excel\Concerns\FromCollection;

class NhanKhauExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return  NhanKhau::select(['hk_id', 'user', 'password', 'ho_ten', 'ngay_sinh', 'ngay_mat', 'gioi_tinh', 'quan_he', 'email', 'sdt', 'ngay_nhap_khau'])->get();
    }
}
