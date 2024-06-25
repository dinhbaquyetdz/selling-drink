@extends('web_chinh.layout.app')
@section('webchinh')
<div class="row bg-white">
    <div class="col-sm-12 col-lg-4 border-end">
        <?php
        if(empty($data3)){
            echo "<h4 style='color: red' class='text-center'>Không có sản phẩm nào để mua!</h4>";
        }else{

       
        $tong=0;
        ?>
        <table class="table">
           
            <tr>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                {{-- <th class="text-center">Thao tác</th> --}}
            </tr>
            @foreach ($data3 as $key => $value)
                <tr>
                    <td>{{$value['tensp']}}</td>
                    <td><img src="image/{{$value['img']}}" alt="" style="width: 50px"></td>
                    <td>{{number_format($value['gia'])}}</td>
                    <td>{{$value['soluong']}}</td>
                    <td>{{number_format(($value['gia'])*($value['soluong']))}}</td>
                    {{-- <td class="text-center"><a href="{{ route('deleteCart', ['id'=>$key]) }}"><i class="fa fa-times" aria-hidden="true"></i></a></td> --}}
                </tr>    
                <?php 
                
                $tong = $tong+($value['gia'])*($value['soluong'])
                ?>
                
            @endforeach
            
                {{-- <tr>
                    <td colspan="6" class=""><i class="me-3">Thành tiền: {{$tong}}vnđ</i><a href=""><button class="btn btn-primary">Mua({{count($data3)}})</button></a></td>
                </tr> --}}
        </table>
        
       
    </div>
    <div class="col-sm-12 col-lg-8">
        <div class="row">
            <table class="table">
                <tr>
                    <th>Người nhận hàng:</th>
                    <td>
                        {{Auth::user()->name}}
                        
                    </td>
                </tr>
                <tr>
                    <th>Địa chỉ giao hàng:</th>
                    <td>
                        {{Auth::user()->address}}
                    </td>
                </tr>
                <tr>
                    <th>Số điện thoại người nhận:</th>
                    <form action="{{Route('sell')}}" method="post">
                        @csrf
                        <input type="hidden" name='id_khachhang' value="{{Auth::user()->id}}">
                        <input type="hidden" name='address' value="{{Auth::user()->address}}">
                    <td>
                        <input type="text" class="input" name='phone' placeholder="Nhập số điện thoại" required>
                    </td>
                </tr>
            </table>
            <div class="col-lg-7 col-sm-7 col-7"></div>
            <div class="col-lg-5 col-sm-5 col-5">
                <i class="me-3">Thành tiền: {{number_format($tong)}}vnđ.</i><a><button class="btn btn-primary">Đặt hàng({{count($data3)}})</button></a>
            </div>
        </form>
        </div>
        <?php } ?>
    </div>
</div>
@endsection