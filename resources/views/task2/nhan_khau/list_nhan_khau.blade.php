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

      </div>
      <div class="col-12 col-md-6 col-lg-6 text-right">
        <button class="btn btn-info export_btn mr-3" data-toggle="modal" data-target="#myModal">Export CSV</button>
      </div>
    </div>

    <div class="m-3  " style=" overflow: auto;">
      <table class="table" id="tableNhanKhau">
        <thead>
          <tr>
            <th>STT</th>
            <th>ID</th>
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
        <tbody id="dataNhanKhau">

        </tbody>
      </table>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
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
                <input type="checkbox" name="UTF-8" id="UTF-8" class="charater">
                <label for="UTF-8">UTF-8</label>
              </div>
              <div class="col-12 col-md-6 col-lg-6 text-center">
                <input type="checkbox" name="SHIFT-JIS" id="SHIFT-JIS" class="charater">
                <label for="SHIFT-JIS">SHIFT-JIS</label>
              </div>
            </div>
            <div></div>
          </div>

        </div>

      </div>
    </div>
  </div>
  <div class="modal" id="modalDelete">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Xoá nhân khẩu</h4>
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
          <h3 id="name_confirm"></h3>
        </div>

        <!-- Modal footer -->
      
          <div class="row"  style="padding-left: 15px;padding-right: 15px">
            <div class="col-12 col-md-6 col-lg-6  bg-success text-center pt-3 pb-3"  id="btn_cancel" data-dismiss="modal" style=" border-bottom-left-radius: 5px;"> Huỷ</div>
            <div class="col-12 col-md-6 col-lg-6 bg-danger  text-center pt-3 pb-3" id="btn_confirm" style=" border-bottom-right-radius: 5px;">Xoá</div>
          </div>
          {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
       

      </div>
    </div>
  </div>
</div>
<script>
  url = "{{route('list_nhan_khau')}}";
    url_edit="{{route('edit_nhan_khau','')}}";
    url_delete_nk="{{route('delete_nhan_khau','')}}";
</script>
<script src="{{asset('js/nhan_khau.js')}}"></script>
<script src="{{asset('js/exportcsv.js')}}"></script>
<script>
  $('.charater').click(function(){
        charater = $(this).attr('name');
        console.log(charater);
       if(charater =='utf-8'){
        console.log(charater);
        $("#tableNhanKhau").table2csv_utf();
       }else{
        console.log(charater);
        $("#tableNhanKhau").table2csv_shi();
       }
       
    })
</script>
@endsection