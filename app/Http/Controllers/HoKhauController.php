<?php

namespace App\Http\Controllers;

use App\Models\HoKhau;
use App\Models\NhanKhau;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class HoKhauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hokhau = HoKhau::get();
        $response = array();

        foreach ($hokhau as $i => $item) {

            $response[] = array('id' => $item->ID, 'hk_cd' => $item->HK_CD, 'chu_ho_id' => $item->Chu_Ho_ID, 'dia_chi' => $item->Dia_Chi, 'ngay_cap' => $item->Ngay_Cap, 'stv' => count($item->nhankhau));
        }
        echo json_encode($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhankhau = NhanKhau::get();
        return view('task1.ho_khau.add_ho_khau', compact('nhankhau'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'hk_cd' => 'required',
            'dia_chi' => 'required',
            'ngay_cap' => 'required'
        ];

        $messege = [
            'hk_cd.required' => 'Hộ khẩu công dân không được trống',
            'dia_chi.required' => 'Địa chỉ không được trống',
            'ngay_cap.required' => 'Ngày cấp không được trống'
        ];
        $vali = Validator::make($request->all(), $rules, $messege);

        if ($vali->fails()) {
            return redirect()->back()->withErrors($vali)->withInput();
        } else {
            HoKhau::create(['HK_CD' => $request['hk_cd'], 'Chu_Ho_ID' => '0', 'Dia_Chi' => $request['dia_chi'], 'Ngay_Cap' => $request['ngay_cap']]);
        }
        return redirect()->back()->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hk = HoKhau::where('ID', $id)->first();
        $nk = NhanKhau::where('HK_ID', $id)->get();
        // dd($nk);
        return view('task1.ho_khau.edit_ho_khau', compact('hk', 'nk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all(),$id);
        HoKhau::where('ID', $id)->update(['HK_CD' => $request['hk_cd'], 'Chu_Ho_ID' => $request['chu_ho_id'], 'Dia_Chi' => $request['dia_chi'], 'Ngay_Cap' => $request['ngay_cap']]);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HoKhau::destroy($id);
    }
    public function getListNhanKhau($id)
    {
        $nk = NhanKhau::where('HK_ID', $id)->get();
        $respones = array();
        foreach ($nk as $item) {
            $respones[] = array('id' => $item->id, 'hk_id' => $item->HK_ID, 'ho_ten' => $item->Ho_Ten, 'ngay_sinh' => $item->Ngay_Sinh, 'ngay_mat' => $item->Ngay_Mat, 'gioi_tinh' => $item->Gioi_Tinh, 'quan_he' => $item->Quan_He, 'email' => $item->Email, 'sdt' => $item->SDT, 'ngay_nhap_khau' => $item->Ngay_Nhap_Khau, 'hinh_anh' => $item->Hinh_Anh);
        }
        echo json_encode($respones);
    }

    public function add_member($id)
    {
        $nk = NhanKhau::where('HK_ID','=','null')->get();
        //con thắc mắc phần này đợi hỏi
        return view('task1.ho_khau.add_member_nk', compact('id'));
    }
}
