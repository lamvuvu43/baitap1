<?php

namespace App\Http\Controllers;

use App\Models\HoKhau;
use App\Models\NhanKhau;
use Illuminate\Http\Request;

class NhanKhauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nk=NhanKhau::get();
        $respones=array();
        foreach($nk as $item){
            $respones[]=array('id'=>$item->ID,'hk_id'=>$item->HK_ID,'ho_ten'=>$item->Ho_Ten,'ngay_sinh'=>$item->Ngay_Sinh,'ngay_mat'=>$item->Ngay_Mat,'gioi_tinh'=>$item->Gioi_Tinh,'quan_he'=>$item->Quan_He,'email'=>$item->Email,'sdt'=>$item->SDT,'ngay_nhap_khau'=>$item->Ngay_Nhap_Khau);
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
        $hk=HoKhau::get();
        return view('task2.nhan_khau.add_nhan_khau',compact('hk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nk=NhanKhau::where('ID',$id)->first();
        $hk=HoKhau::get();
        return view('task2.nhan_khau.edit_nhan_khau',compact('hk','nk'));
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
        dd($request->all());
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
