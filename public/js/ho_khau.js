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
                    "<a class='btn btn-danger m-1 delete_btn' data-id='" +
                    value.id +
                    "'><i class='far fa-trash-alt'></i></a>";
                dataTable +=
                    "<a class='btn btn-primary m-1' href='" +
                    url_edit +
                    "/" +
                    value.id +
                    "'><i class='far fa-edit'></i></i></a>";
                dataTable +=
                    "<a class='btn btn-success m-1' href='add_ho_khau'><i class='far fa-address-card'></i></i></a>";
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
    console.log("working");
    id = $(this).data("id");
    i=0;
    dataTable=''
    $("#memberModal").modal("show");
    $.ajax({
        url: url_get_list_nhan_khau +"/"+id,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
                i = i + 1;
                dataTable += "<tr id=" + value.id + ">";
                dataTable += "<td>";
                dataTable += i;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.id;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.ho_ten;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += "<div class='avatar'>";
                dataTable += "<img src='" + value.hinh_anh + "'>";
                dataTable += "</div>";
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.ngay_sinh;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.ngay_mat;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.gioi_tinh;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.quan_he;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.email;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.sdt;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable += value.ngay_nhap_khau;
                dataTable += "</td>";
                dataTable += "<td>";
                dataTable +=
                    "<a class='btn btn-danger m-1 delete_btn' data-id='" +
                    value.id +
                    "'><i class='far fa-trash-alt'></i></a>";
                dataTable +=
                    "<a class='btn btn-primary m-1' href='" +
                    url_edit +
                    "/" +
                    value.id +
                    "'><i class='far fa-edit'></i></i></a>";
                dataTable +=
                    "<a class='btn btn-success m-1' href='add_ho_khau'><i class='fas fa-eye'></i></a>";
                dataTable += "</tr>";
            });
            $("#dataNhanKhau").html(dataTable);
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
        },
        error: function (e) {
            console.log(e.responseJSON.message);
        },
    });
});
// $(document).on("mouseenter", ".member_hk", function () {
//     console.log('working');
//     $("#memberModal").modal("show");
// });
