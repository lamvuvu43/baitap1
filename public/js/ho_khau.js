window.onload = function () {
    $("#tableHoKhau").DataTable({
        // destroy: true, // dùng khi cần ghi lại dữ liệu của bảng
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            error: function (e) {
                console.log(e.responseJSON.message);
            },
        },
        columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex" }, // mặc định của cột số thứ tự là DT_RowIndex
            { data: "hk_cd", name: "hk_cd" },
            { data: "chu_ho_id", name: "chu_ho_id" },
            { data: "dia_chi", name: "dia_chi" },
            { data: "ngay_cap", name: "ngay_cap" },
            { data: "stv", name: "stv" },
            { data: "action", name: "Chức năng" },
        ],
        language: {
            info: "Từ _START_ đến _END_ của _TOTAL_ dòng",
            lengthMenu: " Hiện thị _MENU_ dòng ",
            zeroRecords: "Không có giữ liệu",
            infoEmpty: "",
            infoFiltered: "(tìm thấy trong _MAX_ dòng dữ liệu)",
            search: "Tìm kiếm",
            processing: "Đang loading...",
            paginate: {
                previous: "Trước",
                next: "Tiếp theo",
            },
        },
        pageLength: 4,
    });
};
var token = $("meta[name='csrf-token']").attr("content");
var id_hk = "";
$(document).on("click", ".delete_btn", function () {
    id_hk = $(this).data("id");
    console.log(id_hk);
    $("#name_confirm_hk").html(
        $("#" + id_hk)
            .find("td:eq(1)")
            .html()
    );
    $("#modalDeleteHK").modal("show");
});

$("#btn_confirm_hk").click(function () {
    $.ajax({
        url: url_delete_hk + "/" + id_hk,
        type: "DELETE",
        data: {
            id: id_hk,
            _token: token,
        },
        success: function (data) {
            console.log(data);
            $("#modalDeleteHK").modal("hide");
            $("#" + id_hk).hide(500);
        },
        error: function (e) {
            console.log(e.responseJSON.message);
        },
    });
});
$(document).on("click", ".member_hk", function () {
    // console.log("working");
    id = $(this).data("id");
    console.log(id);

    $("#table_member").show(500);

    $("#tableNhanKhau").DataTable({
        destroy: true, // dùng khi cần ghi lại dữ liệu của bảng
        processing: true,
        serverSide: true,
        ajax: {
            url: url_get_list_nhan_khau + "/" + id,
            // success:function(){
            //     scrollTest("table_member");
            // },
            error: function (e) {
                console.log(e.responseJSON.message);
            },
        },

        columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex" },
            // { data: "id", name: "id" },
            { data: "user", name: "user" },
            { data: "ho_ten", name: "ho_ten" },
            { data: "hinh_anh", name: "hinh_anh" },
            { data: "ngay_sinh", name: "ngay_sinh" },
            { data: "ngay_mat", name: "ngay_mat" },
            { data: "gioi_tinh", name: "gioi_tinh" },
            { data: "quan_he", name: "quan_he" },
            { data: "email", name: "email" },
            { data: "sdt", name: "sdt" },
            { data: "ngay_nhap_khau", name: "ngay_nhap_khau" },
            { data: "action", name: "Chức năng" },
        ],
        language: {
            info: "Từ _START_ đến _END_ của _TOTAL_ dòng",
            lengthMenu: " Hiện thị _MENU_ dòng ",
            zeroRecords: "Không có giữ liệu",
            infoEmpty: "",
            infoFiltered: "(tìm thấy trong _MAX_ dòng dữ liệu)",
            search: "Tìm kiếm",
            processing: "Đang loading...",
            paginate: {
                previous: "Trước",
                next: "Tiếp theo",
            },
        },
        pageLength: 4,
    });
    setTimeout(function () {
        scrollTest("table_member");
    }, 1500);
});

// $(document).on("mouseenter", ".member_hk", function () {
//     console.log('working');
//     $("#memberModal").modal("show");
// });
var id_nk = "";
$(document).on("click", ".delete_btn_nk", function () {
    id_nk = $(this).data("id");
    name_confirm = $("#" + id_nk + "nk")
        .find("td:eq(2)")
        .html();
    $("#name_confirm_nk").html(name_confirm);
    $("#modalDeleteNK").modal("show");
});
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
                $("#" + id_nk + "nk").hide(500);
            }
        },
        error: function (e) {
            console.log(e.responseJSON.message);
        },
    });
});

function scrollTest(table_member) {
    var elmnt = document.getElementById(table_member);
    elmnt.scrollIntoView({ behavior: "smooth"});
}

