<?php

namespace App\Http\Controllers;

use App\Models\HoKhau;
use App\Models\NhanKhau;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

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
            $respones[] = array('id' => $item->ID, 'hk_id' => $item->HK_ID, 'ho_ten' => $item->Ho_Ten, 'ngay_sinh' => $item->Ngay_Sinh, 'ngay_mat' => $item->Ngay_Mat, 'gioi_tinh' => $item->Gioi_Tinh, 'quan_he' => $item->Quan_He, 'email' => $item->Email, 'sdt' => $item->SDT, 'ngay_nhap_khau' => $item->Ngay_Nhap_Khau, 'hinh_anh' => $item->Hinh_Anh);
        }
        echo json_encode($respones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hk = HoKhau::get();
        return view('task2.nhan_khau.add_nhan_khau', compact('hk'));
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
            'Ngay_Nhap_Khau' => "required"
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
            'Ngay_Nhap_Khau.required' => "Ngày nhập khẩu không được trống"
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
                'Ngay_Sinh' => $request['Ngay_Sinh'],
                'Ngay_Mat' => $request['Ngay_Mat'],
                'Gioi_Tinh' => $request['Gioi_Tinh'],
                'Quan_He' => $request['Quan_He'],
                'Email' => $request['Email'],
                'SDT' => $request['SDT'],
                'Ngay_Nhap_Khau' => $request['Ngay_Nhap_Khau']
            ]);
            NhanKhau::where('ID', $id)->update(['Hinh_Anh' => 'images/' . $filename]);
            return redirect()->back()->with('success', 'Thêm nhân khẩu thành công')->withInput();
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
        $nk = NhanKhau::where('ID', $id)->first();
        $hk = HoKhau::get();
        return view('task2.nhan_khau.edit_nhan_khau', compact('hk', 'nk'));
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
    //   dd($request->file('Hinh_Anh'));
        if($request->file('Hinh_Anh')!=null){
            $file=$request->file(['Hinh_Anh']);
            $filename = time() . '.' .  $file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            $request['Hinh_Anh']='/images'.$filename;
            NhanKhau::where('ID',$id)->update(Arr::except($request->all(),['_token','Hinh_Anh']));
            NhanKhau::where('ID',$id)->update(['Hinh_Anh'=>'images/'.$filename]);
        }else{     
            NhanKhau::where('ID',$id)->update(Arr::except($request->all(),['_token','Hinh_Anh']));
        }
        return redirect()->route('nhan_khau')->with('success','Cập nhật thành công');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
