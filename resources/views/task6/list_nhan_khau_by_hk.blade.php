@extends('index')
@section('pageTitle','Danh sách nhân khẩu trong hộ khẩu')
@section('list_nhan_khau_by_hk')

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="m-3">Danh sách nhân khẩu</h3>
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
                    
                    </tr>
                </thead>
                <tbody id="dataNhanKhau">
                    @foreach ($nk as $i=> $item)
                    <?php $i =$i+1?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->Ho_Ten}}</td>
                        <td>
                            <div class="avatar">
                                <img src="{{$item->Hinh_Anh}}" alt="">
                            </div>
                        </td>
                        <td>{{$item->Ngay_Sinh}}</td>
                        <td>{{$item->Ngay_Mat}}</td>
                        <td>{{$item->Gioi_Tinh}}</td>
                        <td>{{$item->Quan_He}}</td>
                        <td>{{$item->Email}}</td>
                        <td>{{$item->SDT}}</td>
                        <td>{{$item->Ngay_Nhap_Khau}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tableNhanKhau').DataTable({
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
    })
  

</script>
@endsection