@extends('index')
@section('pageTitle','Danh sách nhân khẩu trong hộ khẩu')
@section('list_nhan_khau_after_add')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="mt-3 p-3"  style="border: 1px solid #333;border-radius:5px">Danh sách nhân khẩu trong hộ khẩu có id {{$id_hk}}</h3>
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
                        <th>Hành động</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
    <div class="modal" id="modalDeleteNK">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xoá nhân khẩu</h4>
                </div>
                <div class="modal-body text-center">
                    <h3 id="name_confirm_nk"></h3>
                </div>
                <div class="row" style="padding-left: 15px;padding-right: 15px">
                    <div class="col-12 col-md-6 col-lg-6  bg-success text-center pt-3 pb-3" id="btn_cancel_nk"
                        data-dismiss="modal" style=" border-bottom-left-radius: 5px;"> Huỷ</div>
                    <div class="col-12 col-md-6 col-lg-6 bg-danger  text-center pt-3 pb-3" id="btn_confirm_nk"
                        style=" border-bottom-right-radius: 5px;">Xoá</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var url_delete_nk="{{route('delete_nhan_khau','')}}";
    var token = $("meta[name='csrf-token']").attr("content");
    window.onload=function(){
        $("#tableNhanKhau").DataTable({
        // destroy: true, // dùng khi cần ghi lại dữ liệu của bảng
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('list_nhan_khau_after_add',$id_hk)}}",
            error: function (e) {
                console.log(e.responseJSON.message);
            },
        },
        columns: [
            { data: "DT_RowIndex", name: "stt" },
            // { data: "id", name: "id" },
            { data: "user", name: "user" },
            { data: "ho_ten", name: "ho_ten" },
            { data: "hinh_anh", name: "hinh_anh" },
            { data: "ngay_sinh", name: "ngay_sinh" },
            { data: "ngay_mat", name: "ngay_mat" },
            { data: "gioi_tinh", name: "gioi_tinh" },
            { data: "quan_he", name: "email" },
            { data: "email", name: "email" },
            { data: "sdt", name: "sdt" },
            { data: "ngay_nhap_khau", name: "ngay_nhap_khau" },
            { data: "action", name: "hành động" },
        ],
        language: {
            info: "Từ _START_ đến _END_ của _TOTAL_ dòng",
            lengthMenu: " Hiện thị _MENU_ dòng ",
            zeroRecords: "Không có giữ liệu",
            infoEmpty: "",
            infoFiltered: "(tìm thấy trong _MAX_ dòng dữ liệu)",
            search: "Tìm kiếm",
            processing:"Đang loading...",
            paginate: {
                previous: "Trước",
                next: "Tiếp theo",
            },
        },
        pageLength: 4,
    });
    }

    // ----------------------------------------------------------------------
    $(document).on('click','.delete_btn_nk',function(){
        id_nk = $(this).data("id");
        name_confirm = $("#" + id_nk)
            .find("td:eq(2)")
            .html();
        $("#name_confirm_nk").html(name_confirm);
        $("#modalDeleteNK").modal("show");
    })
    $("#btn_confirm_nk").click(function () {
    console.log(id_nk);
    $.ajax({
        url: url_delete_nk + "/" + id_nk,
        type: "DELETE",
        data: {
            id: id_nk,
            _token: token,
        },
        success: function (data) {
            console.log(data);
            if (data == "fail") {
                $("#btn_cancel_nk").click();
                alert("không xoá được do người này đang là chủ hộ");
            } else {
                $("#btn_cancel_nk").click();
                $("#" + id_nk).hide(500);
            }
        },
        error: function (e) {
            console.log(e.responseJSON.message);
        },
    });
});
</script>

@endsection