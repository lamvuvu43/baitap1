@extends('index')
@section('pageTitle',' Sửa nhân khẩu')
@section('add_ho_khau')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="m-3">Sửa nhân khẩu</h3>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <button class="btn btn-second quaylai">Quay lại</button>
            </div>

        </div>
        <div>
            <form action="{{route('process_edit_nhan_khau',$nk->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="HK_ID" class="mr-2">Hộ khẩu ID</label>
                    <input name="HK_ID" id="HK_ID" class="form-control" value="{{$nk->id}}" readonly>
                        @error('hk_cd')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Ho_Ten" class="mr-2">Họ tên</label>
                        <input type="text" name="Ho_Ten" value="{{$nk->Ho_Ten}}"
                            class="form-control @error('Ho_Ten') is-invaild @enderror">
                        @error('Ho_Ten')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="user" class="mr-2">User</label>
                        <input name="user" id="user" class="form-control" value="{{old('user')}}" name="user">
                        @error('user')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="password" class="mr-2">Mật khẩu</label>
                        <input type="text" name="password" value="{{old('password')}}"
                            class="form-control @error('password') is-invaild @enderror">
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Ngay_Sinh" class="mr-2">Ngày sinh</label>
                        <input type="date" class=" @error('Ngay_Sinh') is-invalid @enderror form-control"
                            name="Ngay_Sinh" placeholder="" value="{{$nk->Ngay_Sinh}}" id="Ngay_Sinh">
                        @error('Ngay_Sinh')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Ngay_Mat" class="mr-2">Ngày Mất</label>
                        <input type="date" class=" @error('Ngay_Mat') is-invalid @enderror form-control" name="Ngay_Mat"
                            placeholder="" value="{{$nk->Ngay_Mat}}" id="Ngay_Mat">
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
                            placeholder="" value="{{$nk->Quan_He}}" id="Quan_He">
                        @error('Quan_He')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Email" class="mr-2">Email</label>
                        <input type="email" class=" @error('Email') is-invalid @enderror form-control" name="Email"
                    placeholder="" value="{{$nk->Email}}" id="Email">
                        @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="SDT" class="mr-2">Số điện thoại</label>
                        <input type="text" class=" @error('SDT') is-invalid @enderror form-control" name="SDT"
                            placeholder="" value="{{$nk->SDT}}" id="SDT">
                        @error('SDT')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Ngay_Nhap_Khau" class="mr-2">Ngày nhập khẩu</label>
                        <input type="date" name="Ngay_Nhap_Khau" value="{{$nk->Ngay_Nhap_Khau}}" class="form-control @error('Ngay_Nhap_Khau')
                            is-invalid
                        @enderror">
                        @error('Ngay_Nhap_Khau')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="Hinh_Anh" class="mr-2">Hình ảnh</label>
                        {{-- <div><a class="btn btn-info" id="avatar">Chọn hình</a></div> --}}
                        <input type="file" id="upload_avatar" name="Hinh_Anh" value="" class="form-control @error('Ngay_Nhap_Khau')
                            is-invalid
                        @enderror" accept="image/*" >
                        @error('Hinh_Anh')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center m-3">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
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