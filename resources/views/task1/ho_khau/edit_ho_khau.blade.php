@extends('index')
@section('pageTitle',' Cập nhật hộ khẩu')
@section('edit_ho_khau')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="text-center bg-light">
            <h3 class="m-3 p-3">Cập hộ khẩu</h3>
        </div>
        <div>
            <button class="btn btn-second quaylai">Quay lại</button>
        </div>
        <div>
            <form action="{{route('process_edit_ho_khau',$hk->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="hk_cd" class="mr-2">Hộ khẩu công dân</label>
                        <input type="text" class=" @error('name_f') is-invalid @enderror form-control"" name=" hk_cd"
                            placeholder="12455325" value="{{$hk->hk_cd}}" id="hk_cd">
                        @error('hk_cd')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="chu_ho_id" class="mr-2">Chủ hộ ID</label>
                        <select name="chu_ho_id" id="chu_ho_id" class="form-control">
                            @foreach ($nk as $item)
                            <option value="{{$item->id}}" <?php echo ($item->id==$hk->chu_ho_id)? "selected":"" ?> >{{$item->ho_ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="dia_chi" class="mr-2">Địa chỉ</label>
                        <input type="text" class=" @error('dia_chi') is-invalid @enderror form-control" name=" dia_chi"
                            placeholder="12455325" value="{{$hk->dia_chi}}" id="dia_chi">
                        @error('dia_chi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <label for="ngay_cap" class="mr-2">Ngày Cấp</label>
                        <input type="text" class=" @error('ngay_cap') is-invalid @enderror form-control" name="ngay_cap"
                            placeholder="12455325" value="{{$hk->ngay_cap}}" id="ngay_cap">
                        @error('ngay_cap')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center m-3">
                    <button type="submit" class="btn btn-success">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("input").keyup(function(){
        $(this).parent().find('.alert').hide(500);
    });
    $('.quaylai').click(function(){
        window.history.back();
    })
</script>
@endsection