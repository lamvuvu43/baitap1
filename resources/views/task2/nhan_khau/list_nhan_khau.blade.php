@extends('index')
@section('pageTitle','Danh sách nhân khẩu')
@section('list_nhan_khau')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="m-3">Danh sách nhân khẩu</h3>
        </div>
        <div class="row">
            
            <div class="col-12 col-md-6 col-lg-6 ">
            <a class="btn btn-primary btn_add" href="{{route('add_nhan_khau')}}">Thêm</a>
            </div>
         </div>
        <div class="m-3  " style=" overflow: auto;">
            <table class="table" id="tableNhanKhau">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Ngày mất</th>
                        <th>Giới tính</th>
                        <th>Quan hệ</th>
                        <th>Email</th>
                        <th>SDT</th>
                        <th>Ngày nhập khẩu</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody id="dataNhanKhau">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    url = "{{route('list_nhan_khau')}}";
</script>
<script src="{{asset('js/nhan_khau.js')}}"></script>
@endsection
    
