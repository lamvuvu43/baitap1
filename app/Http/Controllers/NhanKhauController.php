<?php

namespace App\Http\Controllers;

use App\Models\HoKhau;
use App\Models\NhanKhau;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Throwable;
use Intervention\Image\Facades\Image;

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
        return DataTables::of($nk)
            ->addColumn('stt', function ($nk) {
                return "";
            })
            ->editColumn('hinh_anh', function ($nk) {
                if ($nk->hinh_anh != '') {
                    return "<div class='avatar'> <img src='" . $nk->hinh_anh . "' alt='hình ảnh avatar'></div>";
                } else {
                    return "";
                }
            })
            ->setRowId(function ($nk) {
                return $nk->id;
            })
            ->addColumn('action', function ($nk) {
                return "<a class='btn btn-danger m-1 delete_btn' data-id='" . $nk->id . "'><i class='far fa-trash-alt'></i></a>
            <a class='btn btn-primary m-1' href='" . route('edit_nhan_khau', $nk->id) . "'><i class='far fa-edit'></i></i></a>
            ";
            })
            ->rawColumns(['hinh_anh', 'action'])
            ->make(true);
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
            'hk_id' => "required",
            'ho_ten' => "required",
            
            'ngay_sinh' => "required",
            'gioi_tinh' => "required",
            'quan_he' => "required",
            'email' => "required",
            // 'sdt' => "required",
            'sdt' => "required|regex:/0([1-9]{1})([0-9]{8})/",
            'ngay_nhap_khau' => "required",
            'user' => 'required|unique:nhan_khau,user',
            'password' => 'required',
            'img64'=>'required',
        ];
        $message = [
            'hk_id.required' => "hộ khẩu id không được trống",
            'ho_ten.required' => "họ tên không được trống ",
            'ngay_sinh.required' => "vui lòng nhập ngày sinh",
            'gioi_tinh.required' => "vui lòng chọn một giới tính",
            'quan_he.required' => "vui lòng chọn một quan hệ",
            'email.required' => "vui lòng nhập email",
            'sdt.required' => "vui lòng nhập số điện thoại",
            'sdt.regex' => "số điện thoại không hợp lệ",
            'ngay_nhap_khau.required' => "ngày nhập khẩu không được trống",
            'user.required' => "vui lòng nhập user",
            'user.unique' => "tài khoản đã tồn tại",
            // 'user.regex' => "User không hợp lệ. Tài khoản hợp lệ khi có cả chữ và số",
            'password.required' => "vui lòng nhập mật khẩu",
            'img64.required'=>"Hình ảnh không được trống"
        ];
      

        $vali = validator::make($request->all(), $rules, $message);
        if ($vali->fails()) {
            dd($vali->fails());
            return redirect()->back()->witherrors($vali)->withinput();
        } else {
            // dd($request->all());
            $id = NhanKhau::insertGetId([
                'hk_id' => $request['hk_id'],
                'ho_ten' => $request['ho_ten'],
                "user" => $request['user'],
                "password" => bcrypt($request['password']),
                'ngay_sinh' => $request['ngay_sinh'],
                'ngay_mat' => $request['ngay_mat'],
                'gioi_tinh' => $request['gioi_tinh'],
                'quan_he' => $request['quan_he'],
                'email' => $request['email'],
                'sdt' => $request['sdt'],
                'ngay_nhap_khau' => $request['ngay_nhap_khau']
            ]);
            $extension = explode('/', mime_content_type($request['img64']))[1];
            $filename = time() . '.' . $extension;
            Image::make($request['img64'])->save(public_path('/images/' . $filename)); //save vào folder
            
            NhanKhau::where('id', $id)->update(['hinh_anh' => "/images/" . $filename]);
           
            $check_chu_ho_id = HoKhau::where('id', $request['hk_id'])->first();
            if ($check_chu_ho_id->chu_ho_id == null) {
                HoKhau::where('id', $request['chu_ho'])->update(['chu_ho_id' => $id]);
            }
            return redirect()->route('ho_khau')->with('success', 'thêm nhân khẩu thành công');
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
        if ($request['img64'] != null) {
            $extension = explode('/', mime_content_type($request['img64']))[1];
            $filename = time() . '.' . $extension;
            Image::make($request['img64'])->save(public_path('/images/' . $filename));
            NhanKhau::where('id', $id)->update(Arr::except($request->all(), ['_token', 'hk_id','img64']));
            NhanKhau::where('id', $id)->update(['hinh_anh' => "/images/" . $filename]);
        } else {
            // dd($request->all());
            NhanKhau::where('id', $id)->update(Arr::except($request->all(), ['_token', 'hinh_anh']));
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

        $check_chu_ho = HoKhau::where('chu_ho_id', $id)->first();

        try {
            if ($check_chu_ho->chu_ho_id == '') {
                NhanKhau::where('id', $id)->delete();
            } else {
                echo "fail";
            }
        } catch (Throwable  $e) {
            NhanKhau::where('id', $id)->delete();
        }
    }
    public function nhan_khau_by_hk()
    {

        return view('task6.list_nhan_khau_by_hk');
    }
    public function list_nhan_khau_by_hk()
    {
        $nk = NhanKhau::where('hk_id', Auth::guard('nhan_khau_login')->user()->hk_id)->get();
        return DataTables::of($nk)
            ->addColumn('stt', function ($nk) {
                return "";
            })
            ->editColumn('hinh_anh', function ($nk) {
                if ($nk->hinh_anh != '') {
                    return "<div class='avatar'> <img src='" . $nk->hinh_anh . "' alt='hình ảnh avatar'></div>";
                } else {
                    return "";
                }
            })
            ->setRowId(function ($nk) {
                return $nk->id;
            })
            ->rawColumns(['hinh_anh'])
            ->make(true);
    }
}
