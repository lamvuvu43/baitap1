window.onload = function () {
    $("#tableNhanKhau").DataTable({
        destroy: true, // dùng khi cần ghi lại dữ liệu của bảng
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            error: function (e) {
                console.log(e.responseJSON.message);
            },
        },

        columns: [
            { data: "stt", name: "id" },
            { data: "id", name: "id" },
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
            { data: "action", name: "Chức năng" },
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
        pageLength: 2,
    });
};
var id_nk = "";
var token = $("meta[name='csrf-token']").attr("content");
$(document).on("click", ".delete_btn", function () {
    id_nk = $(this).data("id");
    ho_ten = $("#" + id_nk)
        .parent()
        .find("td:eq(3)")
        .html();
    $("#name_confirm").html(ho_ten);
    $("#modalDelete").modal("show");
});

$("#btn_confirm").click(function () {
    console.log(id_nk);
    $.ajax({
        url: url_delete_nk + '/'+ id_nk
        , type: 'DELETE'
        , data: {
            "id": id_nk
            , "_token": token
            ,
        }
        , success: function (data) {
            console.log(data);
            if(data =='fail'){
                $("#btn_cancel").click();
                alert("không xoá được do người này đang là chủ hộ");
            }else{
                $("#btn_cancel").click();
                $("#" + id_nk).hide(500);
            }
           
            
        }
        , error: function () {
            alert('Đã có lỗi xảy ra vui lòng kiểm tra lại');
        }
    });
});
