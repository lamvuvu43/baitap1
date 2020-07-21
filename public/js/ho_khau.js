window.onload = function () {
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            dataTable = '';
            var i = 0;
            $.each(data, function (key, value) {
                i = i + 1;
                dataTable += "<tr id=" + value.id + ">";
                dataTable += "<td>"
                dataTable += i
                dataTable += "</td>"
                dataTable += "<td>"
                dataTable += value.hk_cd
                dataTable += "</td>"
                dataTable += "<td>"
                dataTable += value.chu_ho_id
                dataTable += "</td>"
                dataTable += "<td>"
                dataTable += value.dia_chi
                dataTable += "</td>"
                dataTable += "<td>"
                dataTable += value.ngay_cap
                dataTable += "</td>"
                dataTable += "<td>"
                dataTable += value.stv
                dataTable += "</td>"
                dataTable += "<td>"
                dataTable += "<a class='btn btn-danger m-1 delete_btn' data-id='" + value.id + "'><i class='far fa-trash-alt'></i></a>"
                dataTable += "<a class='btn btn-primary m-1' href='edit_ho_khau/" + value.id + "'><i class='far fa-edit'></i></i></a>"
                dataTable += "<a class='btn btn-success m-1' href='add_ho_khau'><i class='far fa-address-card'></i></i></a>"
                dataTable += "</tr>";
            });
            $('#dataHoKhau').html(dataTable);
            $('#tableHoKhau').DataTable({
                destroy: true
                , "language": {
                    "info": "Từ _START_ đến _END_ của _TOTAL_ dòng"
                    , "lengthMenu": " Hiện thị _MENU_ dòng "
                    , "zeroRecords": "Không có giữ liệu"
                    , "infoEmpty": ""
                    , "infoFiltered": "(tìm thấy trong _MAX_ dòng dữ liệu)"
                    , "search": "Tìm kiếm"
                    , "paginate": {
                        "previous": "Trước"
                        , "next": "Tiếp theo"
                    }
                }
            });
        },
        error: function () {
            console.log(e);
        }
    })
}

$(document).on('click','.delete_btn',function () {
    
     id_hk = $(this).data('id');
    console.log(id_hk)
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "delete_ho_khau/" + id_hk
        , type: 'DELETE'
        , data: {
            "id": id_hk
            , "_token": token
            ,
        }
        , success: function (data) {
            console.log(data);
            $("#" + id_hk).hide(500);
        }
        , error: function () {
            alert('Đã có lỗi xảy ra vui lòng kiểm tra lại');
        }
    });
})
