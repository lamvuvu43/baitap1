@extends('index')
@section('pagetitle','thêm nhân khẩu')
@section('add_ho_khau')
<div class="row" style="margin: 0px; padding-left: 15px; padding-right: 15px">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="m-3">Thêm nhân khẩu</h3>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <button class="btn btn-secondary quaylai">quay lại</button>
            </div>
        </div>
        <div>
            <form action="{{route('process_add_nhan_khau')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="hk_id" class="mr-2">Hộ khẩu id</label>
                        <input name="hk_id" id="hk_id" class="form-control" value="{{$id}}" name="hk_id" readonly>
                        @error('hk_cd')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="ho_ten" class="mr-2">Họ tên</label>
                        <input type="text" name="ho_ten" value="{{old('ho_ten')}}"
                            class="form-control @error('ho_ten') is-invaild @enderror">
                        @error('ho_ten')
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
                        <input type="password" name="password" value="{{old('password')}}"
                            class="form-control @error('password') is-invaild @enderror">
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="ngay_sinh" class="mr-2">Ngày sinh</label>
                        <input type="date" class=" @error('ngay_sinh') is-invalid @enderror form-control"
                            name="ngay_sinh" placeholder="" value="{{old('ngay_sinh')}}" id="ngay_sinh">
                        @error('ngay_sinh')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="ngay_mat" class="mr-2">Ngày mất</label>
                        <input type="date" class=" @error('ngay_mat') is-invalid @enderror form-control" name="ngay_mat"
                            placeholder="" value="{{old('ngay_mat')}}" id="ngay_mat">
                        @error('ngay_mat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="gioi_tinh" class="mr-2">Giới tính</label>
                        <select name="gioi_tinh" id="gioi_tinh" class="form-control">
                            <option value="nam">Nam</option>
                            <option value="nữ">Nữ</option>
                        </select>
                        @error('gioi_tinh')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="quan_he" class="mr-2">Quan hệ</label>
                        <input type="text" class=" @error('quan_he') is-invalid @enderror form-control" name="quan_he"
                            placeholder="" value="{{old('quan_he')}}" id="quan_he">
                        @error('quan_he')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="email" class="mr-2">Email</label>
                        <input type="email" class=" @error('email') is-invalid @enderror form-control" name="email"
                            placeholder="" value="{{old('email')}}" id="email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="sdt" class="mr-2">Số điện thoại</label>
                        <input type="text" class=" @error('sdt') is-invalid @enderror form-control" name="sdt"
                            placeholder="" value="{{old('sdt')}}" id="sdt" maxlength="10">
                        @error('sdt')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="ngay_nhap_khau" class="mr-2">Ngày nhập khẩu</label>
                        <input type="date" name="ngay_nhap_khau" value="<?php  echo date('Y-m-d') ?>" class="form-control @error('ngay_nhap_khau')
                            is-invalid
                        @enderror">
                        @error('ngay_nhap_khau')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <label for="hinh_anh" class="mr-2">Hình ảnh</label>
                                {{-- <div><a class="btn btn-info" id="avatar">chọn hình</a></div> --}}
                                <input type="file" id="upload_avatar" value="" class="form-control @error('ngay_nhap_khau')
                                is-invalid
                            @enderror" accept="image/*" style="display:none">
                                @error('img64')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <input type="text" name="img64" value="{{old('img64')}}" id="img64" style="display:none">

                                <div class="avatar " style="width:100px;height:100px;border:1px solid">
                                    <p class="text-danger text-center mt-3">Nhấp để chọn hình </p>
                                    <img src="" alt="" id="displayImg" >
                                </div>
                            </div>
                        </div>
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
    $('#avatar').click(function(){
        $('#upload_avatar').click();
    });
</script>
{{-- ---------------- upload imamge-------------------- --}}
<script>
    $('.avatar').click(function(){
        $("#upload_avatar").click();
        
    })
    $("#upload_avatar").change(function(){
        encodeImgtoBase64(this)
    })

    function encodeImgtoBase64(element) {
 
        var img = element.files[0];

        var reader = new FileReader();

        reader.onloadend = function() {

        // $("#convertImg").attr("href",reader.result);

        $("#img64").val(reader.result);

        $("#displayImg").attr("src", reader.result);
        }
        $(".avatar").find("p").hide();
        reader.readAsDataURL(img);
}
window.onload=function(){
   if($("#img64").val()!=''){
       $(".avatar").find("p").hide();
   }
    base64 = $("#img64").val()
    $("#displayImg").attr("src", base64);
}
</script>
@endsection