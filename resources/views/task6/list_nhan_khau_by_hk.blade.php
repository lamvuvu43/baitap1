@extends('index')
@section('pageTitle','Danh sách nhân khẩu trong hộ khẩu')
@section('list_nhan_khau_by_hk')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="mt-3 p-3"  style="border: 1px solid #333;border-radius:5px">Danh sách nhân khẩu</h3>
        </div>
        <div class="row">

            <div class="col-12 col-md-6 col-lg-6 ">

            </div>
            <div class="col-12 col-md-6 col-lg-6 text-right">
                {{-- <button class="btn btn-info export_btn" data-toggle="modal" data-target="#myModal">Export CSV</button> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="m-3" style="overflow: auto">
            <table class="table" id="tableNhanKhau">
                <thead>
                    <tr>
                        <th>STT</th>
                        {{-- <th>ID</th> --}}
                        <th>User</th>
                        <th>Họ tên</th>
                        <th>Hình ảnh</th>
                        <th>Ngày sinh</th>
                        <th>Ngày mất</th>
                        <th>Giới tính</th>
                        <th>Quan hệ</th>
                        <th>Email</th>
                        <th>SDT</th>
                        <th>Ngày nhập khẩu</th>
                    </tr>
                </thead>
              
            </table>
        </div>
    </div>
</div>

<script>
    window.onload=function(){
        $("#tableNhanKhau").DataTable({
        // destroy: true, // dùng khi cần ghi lại dữ liệu của bảng
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('list_nhan_khau_by_hk')}}",
            error: function (e) {
                console.log(e.responseJSON.message);
            },
        },
        columns: [
            { data: "DT_RowIndex", name: "stt" },
            // { data: "id", name: "id" },
            { data: "user", name: "user" },
            { data: "ho_ten", name: "Họ tên" },
            { data: "hinh_anh", name: "Hình ảnh" },
            { data: "ngay_sinh", name: "Ngày sinh" },
            { data: "ngay_mat", name: "Ngày mất" },
            { data: "gioi_tinh", name: "Giới tính" },
            { data: "quan_he", name: "Quan hệ" },
            { data: "email", name: "Email" },
            { data: "sdt", name: "SDT" },
            { data: "ngay_nhap_khau", name: "Ngày nhập khẩu" },
        ],
        language: {
            info: "Từ _START_ đến _END_ của _TOTAL_ dòng",
            lengthMenu: " Hiện thị _MENU_ dòng ",
            zeroRecords: "Không có giữ liệu",
            infoEmpty: "",
            infoFiltered: "(tìm thấy trong _MAX_ dòng dữ liệu)",
            search: "Tìm kiếm",
            paginate: {
                previous: "Trước",
                next: "Tiếp theo",
            },
        },
        pageLength: 4,
    });
    }
</script>
   
@endsection