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
            <a class="btn btn-primary btn_add" href="{{route('add_nhan_khau')}}">Thêm nhân khẩu</a>
            </div>
            <div class="col-12 col-md-6 col-lg-6 text-right">
            <button class="btn btn-info export_btn"  data-toggle="modal" data-target="#myModal">Export CSV</button>
            </div>
         </div>
         
        <div class="m-3  " style=" overflow: auto;">
            <table class="table" id="tableNhanKhau">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
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
                        <input type="checkbox" name="UTF-8" id="UTF-8"  class="charater">
                        <label for="UTF-8">UTF-8</label>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6 text-center">
                        <input type="checkbox" name="SHIFT-JIS" id="SHIFT-JIS"  class="charater">
                        <label for="SHIFT-JIS">SHIFT-JIS</label>
                      </div>
                  </div>
                  <div></div>
                </div>
               
              </div>
          
            </div>
          </div>
    </div>
</div>
<script>
    url = "{{route('list_nhan_khau')}}";
    url_edit="{{route('edit_nhan_khau','')}}";
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
    
