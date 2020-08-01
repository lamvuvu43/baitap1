@extends('index')
@section('pageTitle','Danh sách hộ khẩu')
@section('list_ho_khau')
<div class="row" style="margin:10px;">
    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
        <div class="text-center bg-light">
            <h3 class="mt-3 p-3"  style="border: 1px solid #333;border-radius:5px">Danh sách hộ khẩu</h3>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6" >
                <a class="btn btn-primary btn_add ml-3" href="{{route('add_ho_khau')}}">Thêm hộ khẩu</a>
            </div>
            <div class="col-12 col-md-6 col-lg-6 text-right">
                <a class="btn btn-success btn_add mr-3 btn_export">Export CSV</a>
            </div>
        </div>
        <div class="m-3" style=" ">
            <table class="table" id="tableHoKhau">
                <thead>
                    <tr class="bg-success">
                        <th>STT</th>
                        <th>HK_CD</th>
                        <th>Chu_ho_ID</th>
                        <th>Dia_Chi</th>
                        <th>Ngay_Cap</th>
                        <th>Số thành viên</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>

            </table>
        </div>

    </div>
    <div class="modal" id="modalDeleteHK">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xoá hộ khẩu</h4>
                </div>
                <div class="modal-body text-center">
                    <h3 id="name_confirm_hk"></h3>
                    <p class="text-danger">Đồng nghĩa các nhân khẩu trong hộ khẩu sẽ bị xoá đi</p>
                </div>
                <div class="row" style="padding-left: 15px;padding-right: 15px">
                    <div class="col-12 col-md-6 col-lg-6  bg-success text-center pt-3 pb-3" id="btn_cancel_hk"
                        data-dismiss="modal" style=" border-bottom-left-radius: 5px;"> Huỷ</div>
                    <div class="col-12 col-md-6 col-lg-6 bg-danger  text-center pt-3 pb-3" id="btn_confirm_hk"
                        style=" border-bottom-right-radius: 5px;">Xoá</div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalExport" class="modal fade" role="dialog">
        <div class="modal-dialog">
  
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Chọn định dạng</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
  
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-6 text-center">
                  <input type="checkbox" name="utf-8" id="utf_8" class="charater">
                  <label for="UTF-8">UTF-8</label>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-center">
                  <input type="checkbox" name="shift-jis" id="shift_jis" class="charater">
                  <label for="SHIFT-JIS">SHIFT-JIS</label>
                </div>
              </div>
              <div></div>
            </div>
  
          </div>
  
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
    <div class="col-12 col-md-12 col-lg-12">
        <div id="table_member" class="bg-light mt-3" style=" display:none;overflow:auto;">
            <div class="row" >
                <div class="col-12 col-md-12 col-lg-12">
                        <div class="row text-right">
                            <div class="col-12 col-md-12 col-lg-12 text-right" style="background-color: cadetblue">
                                <button class="btn btn-danger close_table">&times;</button>
                            </div>
                        </div>
                        <div class="row bg-light  ml-3 mr-3 pt-3">
                            <div class="col-12 col-md-12 col-lg-12 text-center text-danger" style="border: 1px solid #333; border-radius:5px">
                                <h3 class="p-3">Danh sách thành viên trong hộ khẩu</h3>
                            </div>
                        </div>
                        <div class="row m-3">
                        <table class="table" id="tableNhanKhau" >
                            <thead>
                                <tr class="bg-success">
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
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
        
                        </table>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</div>



<script>
    url = "{{route('list_ho_khau')}}";
    url_edit ="{{route('edit_ho_khau','')}}";
    url_get_list_nhan_khau="{{route('get_list_nhan_khau','')}}";
    url_add_member= "{{route('add_nhan_khau','')}}";
    url_edit_nhan_khau="{{route('edit_nhan_khau','')}}";
    url_delete_nk="{{route('delete_nhan_khau','')}}";
    url_delete_hk="{{route('delete_ho_khau','')}}"
</script>
<script src="{{asset('js/ho_khau.js')}}"></script>
<script>
    $(document).on('mouseover','.popup',function(){
        console.log("mouseover");
        $(this).parent().find('#myPopup').show();
        // $(this).html('Thêm thành viên ')
    })
    $(document).on('mouseleave','.popup',function(){
        // console.log("mouseover");
        $(this).parent().find('#myPopup').hide();
        // $(this).html('Thêm thành viên ')
    })
</script>
<script>
    $('.close_table').click(function(){
        // $("#dataNhanKhau").html("");
        $('#table_member').hide(500);
    })

    $(".btn_export").click(function(){
        $("#modalExport").modal("show");
    });
    $("#utf_8").click(function() {
        window.location.href="{{route('exporthokhau')}}";
    })
    $("#shift_jis").click(function () {
        window.location.href="{{route('exporthokhau_shift')}}";
    })
</script>

@endsection