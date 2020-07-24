<?php

namespace App\Http\Controllers;

use App\Models\HoKhau;
use App\Models\NhanKhau;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class NhanKhauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nk = NhanKhau::get();
        $respones = array();
        foreach ($nk as $item) {
            $respones[] = array('id' => $item->id, 'hk_id' => $item->HK_ID, 'ho_ten' => $item->Ho_Ten, 'ngay_sinh' => $item->Ngay_Sinh, 'ngay_mat' => $item->Ngay_Mat, 'gioi_tinh' => $item->Gioi_Tinh, 'quan_he' => $item->Quan_He, 'email' => $item->Email, 'sdt' => $item->SDT, 'ngay_nhap_khau' => $item->Ngay_Nhap_Khau, 'hinh_anh' => $item->Hinh_Anh);
        }
        echo json_encode($respones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // $hk = HoKhau::get();
        return view('task2.nhan_khau.add_nhan_khau', compact('id'));
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
            'HK_ID' => "required",
            'Ho_Ten' => "required",
            'Hinh_Anh' => "required|mimes:jpeg,png,jpg,gif,svg",
            'Ngay_Sinh' => "required",
            'Gioi_Tinh' => "required",
            'Quan_He' => "required",
            'Email' => "required",
            'SDT' => "required",
            // 'SDT' => "required|regex:/(01)[0-9]{9}/",
            'Ngay_Nhap_Khau' => "required",
            'user' => 'required|unique:nhan_khau,user',
            'password' => 'required'
        ];
        $message = [
            'HK_ID.required' => "Hộ khẩu ID không được trống",
            'Ho_Ten.required' => "Họ tên không được trống ",
            'Hinh_Anh.required' => "Vui lòng chọn 1 hình ảnh",
            'Hinh_Anh.mines' => "Định dạng hình ảnh không hợp lệ",
            'Ngay_Sinh.required' => "Vui lòng nhập ngày sinh",
            'Gioi_Tinh.required' => "Vui lòng chọn một giới tính",
            'Quan_He.required' => "Vui lòng chọn một quan hệ",
            'Email.required' => "Vui lòng nhập email",
            'SDT.required' => "Vui lòng nhập số điện thoại",
            // 'SDT.regex' => "Số điện thoại không hợp lệ",
            'Ngay_Nhap_Khau.required' => "Ngày nhập khẩu không được trống",
            'user.required' => "Vui lòng nhập User",
            'user.unique' => "Tài khoản đã tồn tại",
            'password.required' => "Vui lòng nhập mật khẩu",
        ];
        $vali = Validator::make($request->all(), $rules, $message);
        if ($vali->fails()) {
            // dd($vali->fails());
            return redirect()->back()->withErrors($vali)->withInput();
        } else {
            // dd($request->all());
            $file =  $request->file(['Hinh_Anh']);
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            $id = NhanKhau::insertGetId([
                'HK_ID' => $request['HK_ID'],
                'Ho_Ten' => $request['Ho_Ten'],
                "user" => $request['user'],
                "password" => bcrypt($request['password']),
                'Ngay_Sinh' => $request['Ngay_Sinh'],
                'Ngay_Mat' => $request['Ngay_Mat'],
                'Gioi_Tinh' => $request['Gioi_Tinh'],
                'Quan_He' => $request['Quan_He'],
                'Email' => $request['Email'],
                'SDT' => $request['SDT'],
                'Ngay_Nhap_Khau' => $request['Ngay_Nhap_Khau']
            ]);
            NhanKhau::where('ID', $id)->update(['Hinh_Anh' => '/images/' . $filename]);
            $check_chu_ho_id = HoKhau::where('ID', $request['HK_ID'])->first();
            if ($check_chu_ho_id->Chu_Ho_ID == null) {
                HoKhau::where('ID', $request['HK_ID'])->update(['Chu_Ho_ID' => $id]);
            }
            return redirect()->back()->with('success', 'Thêm nhân khẩu thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $nk = NhanKhau::where('ID', $id)->first();

        return view('task2.nhan_khau.edit_nhan_khau', compact('nk'));
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
        //   dd($request->all());
        if ($request->file('Hinh_Anh') != null) {
            $file = $request->file(['Hinh_Anh']);
            $filename = time() . '.' .  $file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            NhanKhau::where('ID', $id)->update(Arr::except($request->all(), ['_token', 'Hinh_Anh', 'HK_ID']));
            NhanKhau::where('ID', $id)->update(['Hinh_Anh' => "/images/" . $filename]);
        } else {
            // dd($request->all());
            NhanKhau::where('ID', $id)->update(Arr::except($request->all(), ['_token', 'Hinh_Anh']));
        }
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
        DB::table('ho_khau')->where('ID','=',$id)->update(['Chu_Ho_ID'=>0]);
        // $hk = HoKhau::where('ID', $id)->first();
        // if ($hk != null) {
        //     echo "Lỗi không thể xoá. Do người này đang là chủ hộ";
        // } else {
        //     NhanKhau::where('id', $id)->delete();
        // }
        NhanKhau::where('id', $id)->delete();
    }
    public function list_nhan_khau_by_hk()
    {
        $nk = NhanKhau::where('HK_ID', Auth::guard('nhan_khau_login')->user()->HK_ID)->get();
        return view('task6.list_nhan_khau_by_hk', compact('nk'));
    }
}
