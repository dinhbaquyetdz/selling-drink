@extends('web_chinh.layout.app')
@section('webchinh')
<style>
.loai>ul>li>a{
    text-decoration: none;
    color: black;
}
li{
    list-style: none;
}
.loai>ul>li>a:hover{
    display: block;
    background-color: rgb(165, 90, 9);
    color:rgb(226, 224, 208);
}
.dm>h3{
    color:rgb(115, 100, 81);
}
#dpdonhang{
    height: 300px;
    overflow: auto;
    display: none;
}
#info{
    height: 300px;
    /* overflow: auto; */
    display: none;
}
#updateTT{
    /* height: 300px; */
    /* overflow: auto; */
    display: none;
}

</style>
<div class="row bg-white">
    <div class="col-sm-12 col-lg-3 border-end">
        <div class="row fixed">
            <div class="col-12 dm ms-3">
                <h3>MANAGENT</h3>
            </div>
        </div>
        <hr>
        <div class="row sticky-top"> 
            <div class="col-lg-12 col-sm-12 loai">
                <ul class="nav flex-sm-column m-0">
                      <li class="nav-item h-50">
                        <a class="nav-link" id="dh" onclick="return dpDonhang()">Đơn hàng đã mua</a>
                      </li>
                    {{-- </div> --}}
                </ul>
                <hr>
            </div> 
            <div class="col-lg-12 col-sm-12 loai">
                <ul class="nav flex-sm-column m-0">
                      <li class="nav-item h-50">
                        <a class="nav-link" aria-current="page" onclick="return dpTT()" id="thongtincanhan">Thông tin cá nhân</a>
                        
                      </li>
                    {{-- </div> --}}
                </ul>
                <hr>
            </div> 
            <div class="col-lg-12 col-sm-12 loai">
                <ul class="nav flex-sm-column m-0">
                      <li class="nav-item h-50">
                        <a class="nav-link" aria-current="page" onclick="return dpUd()" id="update">Chỉnh sửa thông tin</a>
                        
                        </li>
                    {{-- </div> --}}
                </ul>
                <hr>
            </div> 
        </div>
    </div>
    <div class="col-sm-12 col-lg-9">
        <div class="row" id="dpdonhang">
            <div class="col-12">
                <table class="table">
                    <?php
                    if(empty($data5)){
                        echo "<h4 style='color: red' class='text-center'>Chưa mua bất kỳ sản phẩm nào</h4>";
                    }else{ 
                    $tong=0
                    ?>
                    <tr>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>
                    </tr>
                    @foreach ($data5 as $key => $value)
                        <tr>
                            <td>{{$value->tensp}}</td>
                            <td><img src="image/{{$value->img}}" alt="" style="width: 50px"></td>
                           <td>{{$value->soluong}}</td>
                           <td>{{number_format($value->gia)}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->ngaydat}}</td>
                            <td>
                                @if ($value->trangthai == 1)
                                    Chờ xác nhận
                                @elseif ($value->trangthai == 2)
                                    Đã xác nhận
                                @elseif ($value->trangthai == 3)
                                    Đang giao hàng
                                @elseif ($value->trangthai == 4)
                                    Đã nhận hàng
                                @endif
                            </td>
                            <td>{{$value->thanhtoan == 1 ? "Chưa thanh toán" : "đã thanh toán"}}</td>
                            {{-- <td>{{number_format(($value['gia'])*($value['soluong']))}}</td>
                            <td class="text-center"><a href="{{ route('deleteCart', ['id'=>$key]) }}"><i class="fa fa-times" aria-hidden="true"></i></a></td> --}}
                        </tr>    
                        <?php $tong = $tong+($value['gia'])*($value['soluong'])?>
                    @endforeach
                        {{-- <tr>
                            <td colspan="6" class=""><i class="me-3">Thành tiền: {{$tong}}vnđ</i><a href=""><button class="btn btn-primary">Mua({{count($data3)}})</button></a></td>
                        </tr> --}}
                </table>
                {{-- <div class="row">
                    <div class="col-lg-8 col-sm-8 col-8"></div>
                    <div class="col-lg-4 col-sm-4 col-4">
                        <i class="me-3">Thành tiền: {{number_format($tong)}}vnđ.</i><a href="{{Route('dpSelling')}}"><button class="btn btn-primary">Mua({{count($data3)}})</button></a>
                    </div>
                </div> --}}
                <?php } ?>
            </div>
        </div>
        {{-- Thông tin cá nhân --}}
        <div class="row" id="info">
            <h3><b style="color: red">THÔNG TIN CÁ NHÂN</b></h3>
            <hr>
            <table class="table table-border">
                <tr>
                    <th>Họ và tên:</th>
                    <td>{{Auth::user()->name}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{Auth::user()->email}}</td>
                </tr>
                <tr>
                    <th>Địa chỉ:</th>
                    <td>{{Auth::user()->address}}</td>
                </tr>
                <tr> 
                    <th>Giới tính:</th>
                    <td>{{Auth::user()->gender = 1 ? 'nam' : 'nữ'}}</td>
                </tr>
                <tr> 
                    <th>Ngày sinh:</th>
                    <td>{{Auth::user()->dateOfBirth}}</td>
                </tr>
            </table>
        </div>
        {{-- update thông tin --}}
        <div class="row" id="updateTT">
            <h3><b style="color: red">CHỈNH SỬA THÔNG TIN</b></h3>
            <hr>
            <form action="{{route('updateuser',['id'=>Auth::user()->id])}}" name="myForm" method="post" onsubmit="return validateForm()" >
                @csrf
                <div class="mb-2">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Nhập họ và tên">
                </div>
                {{-- <div class="mb-2">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Nhập email">
                </div> --}}
                <div class="mb-2">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" id="address" class="form-control" name="address" value="{{Auth::user()->address}}" placeholder="Nhập địa chỉ">
                </div>
                <div class="mb-2">
                    <label class="form-label">Ngày sinh</label>
                    <input type="text" id="dateOfBirth" class="form-control" name="dateOfBirth" value="{{Auth::user()->dateOfBirth}}" placeholder="Nhập địa chỉ">
                </div>
                <div class="mb-2">
                    <input type="radio" id="gender" name="gender" value="1">Nam
                    <input type="radio" id="gender" name="gender" value="2">Nữ
                </div>
                <div id="err"></div>
                <button type="submit" id="submit" class="btn btn-primary">Cập nhật</button>
                
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var dh = document.getElementById('dpdonhang');
    var tt = document.getElementById('info');
    var ud = document.getElementById('updateTT');
    var btndh = document.getElementById('dh');
    var btntt = document.getElementById('thongtincanhan');
    var btnud = document.getElementById('update');
    function dpDonhang(){
        dh.style.display = 'block';
        tt.style.display = 'none';
        ud.style.display = 'none';
        btndh.style.color = "blue";
        btntt.style.color = "black";
        btnud.style.color = "black";
    }
    function dpTT(){
        dh.style.display = 'none';
        tt.style.display = 'block';
        ud.style.display = 'none';
        btndh.style.color = "black";
        btntt.style.color = "blue";
        btnud.style.color = "black";
    }
    function dpUd(){
        dh.style.display = 'none';
        tt.style.display = 'none';
        ud.style.display = 'block';
        btndh.style.color = "black";
        btntt.style.color = "black";
        btnud.style.color = "blue";
    }
    function validateForm() {
    let name = document.forms["myForm"]["name"].value;
    let address = document.forms["myForm"]["address"].value;
    let dateOfBirth = document.forms["myForm"]["dateOfBirth"].value;
    let gender = document.forms["myForm"]["gender"].value;
    if (name == "") {
        alert("Họ và tên không được bỏ trống");
        return false;
    }else
    if (address == "") {
        alert("Địa chỉ không được bỏ trống");
        return false;
    }else
    if (dateOfBirth == "") {
        alert("Ngày sinh không được bỏ trống");
        return false;
    }else
    if (gender == "") {
        alert("Giới tính không được bỏ trống");
        return false;
    }
}
</script>
@endsection