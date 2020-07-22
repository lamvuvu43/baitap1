@extends('index')
@section('pageTitle',' Thêm nhân khẩu')
@section('add_ho_khau')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="m-3">Sửa nhân khẩu</h3>
        </div>
        <div class="row">
           <div class="col-12 col-md-6 col-lg-6">
            <button class="btn btn-secondary quaylai">Quay lại</button>
           </div>
        </div>
        <div>
            <form action="{{route('process_add_nhan_khau')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="HK_ID" class="mr-2">Hộ khẩu ID</label>
                        <select name="HK_ID" id="HK_ID" class="form-control">
                            @foreach ($hk as $item)
                            <option value="{{$item->HK_ID}}">{{$item->HK_ID}}</option>
                            @endforeach
                        </select>
                        @error('hk_cd')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Ho_Ten" class="mr-2">Họ tên</label>
                        <input type="text" name="Ho_Ten" value=""
                            class="form-control @error('Ho_Ten') is-invaild @enderror">
                        @error('Ho_Ten')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Ngay_Sinh" class="mr-2">Ngày sinh</label>
                        <input type="date" class=" @error('Ngay_Sinh') is-invalid @enderror form-control"
                            name="Ngay_Sinh" placeholder="12455325" value="" id="Ngay_Sinh">
                        @error('Ngay_Sinh')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Ngay_Mat" class="mr-2">Ngày Mất</label>
                        <input type="date" class=" @error('Ngay_Mat') is-invalid @enderror form-control" name="Ngay_Mat"
                            placeholder="12455325" value="" id="Ngay_Mat">
                        @error('Ngay_Mat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Gioi_Tinh" class="mr-2">Giới tính</label>
                       <select name="Gioi_Tinh" id="Gioi_Tinh" class="form-control">
                           <option value="Nam">Nam</option>
                           <option value="Nữ">Nữ</option>
                       </select>
                        @error('Gioi_Tinh')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Quan_He" class="mr-2">Quan hệ</label>
                        <input type="text" class=" @error('Quan_He') is-invalid @enderror form-control" name="Quan_He"
                            placeholder="12455325" value="" id="Quan_He">
                        @error('Quan_He')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Email" class="mr-2">Email</label>
                        <input type="email" class=" @error('Email') is-invalid @enderror form-control" name="Email"
                            placeholder="12455325" value="" id="Email">
                        @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="SDT" class="mr-2">Số điện thoại</label>
                        <input type="text" class=" @error('SDT') is-invalid @enderror form-control" name="SDT"
                            placeholder="12455325" value="" id="SDT">
                        @error('SDT')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Ngay_Nhap_Khau" class="mr-2">Ngày nhập khẩu</label>
                        <input type="date" name="Ngay_Nhap_Khau" value="<?php  echo date('Y-m-d') ?>" class="form-control @error('Ngay_Nhap_Khau')
                            is-invalid
                        @enderror">
                        @error('Ngay_Nhap_Khau')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Hinh_Anh" class="mr-2">Hình ảnh</label>
                        <div><button>Chọn hình</button></div>
                        <input type="file" name="Hinh_Anh" value="" class="form-control @error('Ngay_Nhap_Khau')
                            is-invalid
                        @enderror">
                        @error('Ngay_Nhap_Khau')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center m-3">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("input").keyup(function(){
        $(this).parent().find('.alert').hide(500);
    });
    $('.quaylai').click(function(){
        window.history.back();
    })
</script>
@endsection