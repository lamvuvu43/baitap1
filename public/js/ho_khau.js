

window.onload = function () {
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function (data) {
            // console.log(data);
            dataTable = "";
            var i = 0;
            $.each(data, function (key, value) {
                i = i + 1;
                dataTable += "<tr id=" + value.id + ">";
                dataTable += "<td>";
                dataTable += i;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.hk_cd;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.chu_ho_id;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.dia_chi;
                dataTable += "</td>";
                dataTable += "<td >";
                dataTable += value.ngay_cap;
                dataTable += "</td>";
                dataTable += "<td class='text-center'>";
                dataTable +=
                    "<button class='btn btn-default member_hk text-primary' data-id='" +
                    value.id +
                    "'>";
                dataTable += value.stv;
                dataTable += "</button>";
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable +=
                    "<a class='btn btn-success m-1 popup' href='" +
                    url_add_member +
                    "/" +
                    value.id +
                    "'><i class='far fa-address-card'></i>";
                dataTable +=
                    " <span class='popuptext' id='myPopup'>Thêm thành viên</span>";
                dataTable += "</a>";

                dataTable +=
                    "<a class='btn btn-primary m-1' href='" +
                    url_edit +
                    "/" +
                    value.id +
                    "'><i class='far fa-edit'></i></i></a>";
                dataTable +=
                    "<a class='btn btn-danger m-1 delete_btn' data-id='" +
                    value.id +
                    "'><i class='far fa-trash-alt'></i></a>";
                dataTable += "</tr>";
            });
            $("#dataHoKhau").html(dataTable);
            $("#tableHoKhau").DataTable({
                destroy: true,
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
            });
        },
        error: function (e) {
            console.log(e.responseJSON.message);
        },
    });
};

$(document).on("click", ".delete_btn", function () {
    id_hk = $(this).data("id");
    console.log(id_hk);
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "delete_ho_khau/" + id_hk,
        type: "DELETE",
        data: {
            id: id_hk,
            _token: token,
        },
        success: function (data) {
            console.log(data);
            $("#" + id_hk).hide(500);
        },
        error: function () {
            alert("Đã có lỗi xảy ra vui lòng kiểm tra lại");
        },
    });
});

$(document).on("click", ".member_hk", function () {
    // $('#tableNhanKhau tbody').empty()
    console.log("working");
    id = $(this).data("id");
    console.log(id);
    i = 0;
    $.ajax({
        url: url_get_list_nhan_khau + "/" + id,
        type: "GET",
        dataType: "json",

        success: function (data) {
            // console.log(data); return false;
            dataTableNk = "";

            $.each(data, function (key, value) {
                i = i + 1;
                dataTableNk += "<tr id=" + value.id + ">";
                dataTableNk += "<td>";
                dataTableNk += i;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.id;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.ho_ten;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += "<div class='avatar'>";
                dataTableNk += "<img src='" + value.hinh_anh + "'>";
                dataTableNk += "</div>";
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.ngay_sinh;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.ngay_mat;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.gioi_tinh;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.quan_he;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.email;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.sdt;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk += value.ngay_nhap_khau;
                dataTableNk += "</td>";
                dataTableNk += "<td>";
                dataTableNk +=
                    "<a class='btn btn-danger m-1 delete_btn_nk' data-id='" +
                    value.id +
                    "'><i class='far fa-trash-alt'></i></a>";
                dataTableNk +=
                    "<a class='btn btn-primary m-1' href='" +
                    url_edit_nhan_khau +
                    "/" +
                    value.id +
                    "'><i class='far fa-edit'></i></i></a>";

                dataTableNk += "</tr>";
            });
            call_table(dataTableNk);
            $("#table_member").show(500);
        },
        error: function (e) {
            console.log(e.responseJSON.message);
        },
    });
});
function call_table(dataTable) {
    $("#tableNhanKhau").DataTable({
        destroy: true,
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
    });
    // console.log(dataTableNk)
    //    table.ajax.reload();
    $("#dataNhanKhau").html(dataTable);
}
// $(document).on("mouseenter", ".member_hk", function () {
//     console.log('working');
//     $("#memberModal").modal("show");
// });
$(document).on("click", ".delete_btn_nk", function () {
    console.log("here");
    id=$(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: url_delete_nk +'/'+id,
        type: "DELETE",
        data: {
            id: id,
            _token: token,
        },
        success: function (data) {
            console.log("delete nk thành công");
            $("#"+id).hide(500);
        },
        error: function (e) {
            console.log(e);
        },
    });
});
