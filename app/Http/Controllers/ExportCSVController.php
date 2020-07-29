<?php

namespace App\Http\Controllers;

use App\Models\NhanKhau;
use Illuminate\Http\Request;
use App\Exports\NhanKhauExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportCSVController extends Controller
{
    public function ExportNhanKhau_SHITF_JIS()
    {
        header('Content-Type: text/csv; charset=shift-jis');
        header('Content-Disposition: attachment; filename=nhan_khau_shift.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array(
            mb_convert_encoding("STT", "SJIS-win", "UTF-8"),
            mb_convert_encoding("HK_ID", "SJIS-win", "UTF-8"),
            mb_convert_encoding("User", "SJIS-win", "UTF-8"),
            mb_convert_encoding("Họ tên", "SJIS-win", "UTF-8"),
            mb_convert_encoding("Ngày sinh", "SJIS-win", "UTF-8"),
            mb_convert_encoding("Ngày Mất", "SJIS-win", "UTF-8"),
            mb_convert_encoding("Giới Tính", "SJIS-win", "UTF-8"),
            mb_convert_encoding("Quan hệ", "SJIS-win", "UTF-8"),
            mb_convert_encoding("Email", "SJIS-win", "UTF-8"),
            mb_convert_encoding("SDT", "SJIS-win", "UTF-8"),
            mb_convert_encoding("Ngày nhập khẩu", "SJIS-win", "UTF-8")
        ));
        $nk = NhanKhau::select(['hk_id', 'user', 'password', 'ho_ten', 'ngay_sinh', 'ngay_mat', 'gioi_tinh', 'quan_he', 'email', 'sdt', 'ngay_nhap_khau'])->orderBy('hk_id', 'ASC')->get();
        foreach ($nk as $i => $item) {
            $i = $i + 1;
            // fputcsv($output, array('hk_id'=>$item->hk_id,'user'=>$item->user,'password'=>$item->password,'ho_ten'=>$item->ho_ten,'ngay_sinh'=>$item->ngay_sinh,'ngay_mat'=>$item->ngay_mat,'gioi_tinh'=>$item->gioi_tinh,'quan_he'=>$item->quan_he,'email'=>$item->email,'sdt'=>$item->sdt,'ngay_nhap_khau'=>$item->ngay_nhap_khau));
            fputcsv($output, array(
                mb_convert_encoding($i, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->hk_id, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->user, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->ho_ten, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->ngay_sinh, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->ngay_mat, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->gioi_tinh, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->quan_he, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->email, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->sdt, "SJIS-win", "UTF-8"),
                mb_convert_encoding($item->ngay_nhap_khau, "SJIS-win", "UTF-8")
            ));
        }
        fclose($output);
    }


    // public function ExportNhanKhau()
    // {
    //     header('Content-Type: text/csv; charset=utf-8');
    //     header('Content-Disposition: attachment; filename=data.csv');
    //     $output = fopen("php://output", "w");
    //     fputcsv($output, array(
    // 'STT',
    // 'HK_ID',
    // 'User',
    // 'Họ tên',
    // 'Ngày sinh',
    // 'Ngày Mất',
    // 'Giới Tính',
    // 'Quan hệ',
    // 'Email',
    // 'SDT',
    // 'Ngày nhập khẩu'
    //     ));
    //     $nk = NhanKhau::select(['hk_id','user','password','ho_ten','ngay_sinh','ngay_mat','gioi_tinh','quan_he','email','sdt','ngay_nhap_khau'])->orderBy('hk_id','ASC')->get();
    //     $reponse = array();
    //     foreach($nk as $i=> $item){
    //         $i =$i+1;
    //         fputcsv($output, array($i,$item->hk_id,$item->user,$item->ho_ten,$item->ngay_sinh,$item->ngay_mat,$item->gioi_tinh,$item->quan_he,$item->email,$item->sdt,$item->ngay_nhap_khau));
    //     }
    //     fclose($output);
    // }

    public function ExportNhanKhau()
    {
        header('Content-Disposition: attachment; filename=NhanKhau.csv');
        $NhanKhau = fopen("php://output", "w");
        fputcsv($NhanKhau, array(
            'HK_ID',
            'User',
            'Họ tên',
            'Ngày sinh',
            'Ngày Mất',
            'Giới Tính',
            'Quan hệ',
            'Email',
            'SDT',
            'Ngày nhập khẩu'
        ));
        return Excel::download(new NhanKhauExport, 'NhanKhau.csv');
        // return (new NhanKhauExport)->download('invoices.csv', Excel::CSV);
        //  (new NhanKhauExport)->download('nhankhau.csv', Excel::CSV);
    }
}
