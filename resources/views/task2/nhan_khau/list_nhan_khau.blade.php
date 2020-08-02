@extends('index')
@section('pageTitle','Danh sách nhân khẩu')
@section('list_nhan_khau')
<div class="row" style="padding: 15px;margin: 0px;">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="text-center bg-light">
      <h3 class="mt-3 p-3" style="border: 1px solid #333;border-radius:5px">Danh sách nhân khẩu</h3>
    </div>
    <div class="row">

      <div class="col-12 col-md-6 col-lg-6" style="padding-bottom: 15px">
        <button class="btn btn-second quaylai">Quay lại</button>
      </div>
      <div class="col-12 col-md-6 col-lg-6 text-right">
        <button class="btn btn-info export_btn mr-3" data-toggle="modal" data-target="#myModal">Export CSV</button>
      </div>
    </div>

    <div style=" overflow: auto;">
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

        <div class="row" style="padding-left: 15px;padding-right: 15px">
          <div class="col-12 col-md-6 col-lg-6  bg-success text-center pt-3 pb-3" id="btn_cancel" data-dismiss="modal"
            style=" border-bottom-left-radius: 5px;"> Huỷ</div>
          <div class="col-12 col-md-6 col-lg-6 bg-danger  text-center pt-3 pb-3" id="btn_confirm"
            style=" border-bottom-right-radius: 5px;">Xoá</div>
        </div>
        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}


      </div>
    </div>
  </div>
</div>
<a href="{{route('export_nk')}}" id="download_utf" style="display:none">Tesst</a>
<a href="{{route('export_nk_shift')}}" id="download_shi" style="display:none">Tesst</a>
<script>
  url = "{{route('list_nhan_khau')}}";
    url_edit="{{route('edit_nhan_khau','')}}";
    url_delete_nk="{{route('delete_nhan_khau','')}}";
</script>
<script src="{{asset('js/nhan_khau.js')}}"></script>
{{-- <script src="{{asset('js/exportcsv.js')}}"></script> --}}
<script>
  $("#utf_8").click(function(){ 
       window.location.href="{{route('export_nk')}}"
    });
    $("#shift_jis").click(function(){
      window.location.href="{{route('export_nk_shift')}}" 
    })
    $('.quaylai').click(function(){
        window.history.back();
    })
    // window.location.href
  
</script>
@endsection