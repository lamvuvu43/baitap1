@extends('index')
@section('pageTitle','Danh sách hộ khẩu')
@section('list_ho_khau')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="m-3">Danh sách hộ khẩu</h3>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
            <a class="btn btn-primary btn_add" href="{{route('add_ho_khau')}}">Thêm</a>
            </div>
        </div>
        <div class="m-3  " style=" overflow: auto;">
            <table class="table" id="tableHoKhau">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>HK_CD</th>
                        <th>Chu_ho_ID</th>
                        <th>Dia_Chi</th>
                        <th>Ngay_Cap</th>
                        <th>Số thành viên</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody id="dataHoKhau">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var url = "{{route('list_ho_khau')}}";
</script>
<script src="{{asset('js/ho_khau.js')}}"></script>
@endsection