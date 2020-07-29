<?php

namespace App\Http\Controllers;

use App\Models\HoKhau;
use App\Models\NhanKhau;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


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
    //   $i=1;
        
        return Datatables::of($hokhau)
        ->addIndexColumn() // thêm số thứ tự dòng
        ->setRowId(function($hokhau){
            return $hokhau->id;
        })
        ->editColumn('chu_ho_id',function($hokhau){
            if($hokhau->chu_ho_id ==0){
                return "";
            }else{
                $nk=DB::table('nhan_khau')->where('id',$hokhau->chu_ho_id)->first();
                return $nk->ho_ten;
            }
        })
        ->addColumn('stv',function($hokhau){
           return  "<button class='btn btn-default member_hk text-primary' data-id='".$hokhau->id."'>".count($hokhau->nhankhau)." </button>";
        })
        ->addColumn('action',function($hokhau){
            return "
            <a class='btn btn-success m-1 popup' href='".route('add_nhan_khau',$hokhau->id)."'><i class='far fa-address-card'></i><span class='popuptext' id='myPopup'>Thêm thành viên</span></a>
            <a class='btn btn-primary m-1' href='".route('edit_ho_khau',$hokhau->id)."'><i class='far fa-edit'></i></i></a>
            <a class='btn btn-danger m-1 delete_btn' data-id='".$hokhau->id."'><i class='far fa-trash-alt'></i></a>
           
           
            ";
        })
        ->rawColumns(['stv','action']) // rawColumns dùng khi cần cho phép chạy tag html nếu không thì sẽ hiện string tag html
        ->make(true);
      
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
            'dia_chi.regex' => 'Địa chỉ không hợp hệ',
            'ngay_cap.required' => 'Ngày cấp không được trống'
        ];
        $vali = Validator::make($request->all(), $rules, $messege);

        if ($vali->fails()) {
            return redirect()->back()->withErrors($vali)->withInput();
        } else {
            HoKhau::create(['hk_cd' => $request['hk_cd'], 'chu_ho_id' => '0', 'dia_chi' => htmlspecialchars($request['dia_chi']), 'ngay_cap' => $request['ngay_cap']]);
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
        $hk = HoKhau::where('id', $id)->first();
        $nk = NhanKhau::where('hk_id', $id)->get();
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
        HoKhau::where('id', $id)->update(['hk_id' => $request['hk_cd'], 'chu_ho_id' => $request['chu_ho_id'], 'Dia_Chi' =>htmlspecialchars( $request['dia_chi']), 'ngay_cap' => $request['ngay_cap']]);
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
        NhanKhau::where("hk_id",$id)->delete();
        HoKhau::destroy($id);
    }
    public function getListNhanKhau($id)
    {
        $nk = NhanKhau::where('hk_id', $id)->get();
        return DataTables::of($nk)
        ->addIndexColumn()
        ->addColumn('stt',function($nk){
           return ""; 
        })
        ->setRowid(function($nk){
            return $nk->id."nk";
        })
        ->editColumn('hinh_anh',function($nk){
           if($nk->hinh_anh!=''){
            return "<div class='avatar'> <img src='".$nk->hinh_anh. "' alt='hình ảnh avatar'></div>";
           }else{
               return "";
           }
        })
        ->addColumn('action',function($nk){
           return "<a class='btn btn-danger m-1 delete_btn_nk' data-id='".$nk->id."'><i class='far fa-trash-alt'></i></a>
            <a class='btn btn-primary m-1' href='".route('edit_nhan_khau',$nk->id)."'><i class='far fa-edit'></i></i></a>
            ";
        })
        ->rawColumns(['hinh_anh','action'])
        ->make(true);
    }

    public function add_member($id)
    {
        $nk = NhanKhau::where('HK_id','=','null')->get();
        //con thắc mắc phần này đợi hỏi
        return view('task1.ho_khau.add_member_nk', compact('id'));
    }
}
