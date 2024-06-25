<style>
   
    
</style>
@extends('web_chinh.layout.app')
@section('webchinh')
<div class="row bg-white">
    <div class="row">
        <div class="col-lg-1 col-sm-1"></div>
        <div class="col-lg-11 col-sm-11 my-3">
            <h3 ><a href="{{Route('index')}}">TRANG CHỦ</a>/<a style="color: red;">GIỎ HÀNG</a></h3>
        </div>
    </div>
    <div class="col-lg-1 col-sm-1"></div>
    <div class="col-lg-10 col-sm-10">
        <div class="row">
            <table class="table">
                <?php
                if(empty($data3)){
                    echo "<h4 style='color: red' class='text-center'>Không có sản phẩm nào trong giỏ hàng!</h4>";
                }else{

                
                $tong=0
                ?>
                <tr>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                @foreach ($data3 as $key => $value)
                    <tr>
                        <td>{{$value['tensp']}}</td>
                        <td><img src="image/{{$value['img']}}" alt="" style="width: 50px"></td>
                        <td>{{number_format($value['gia'])}}</td>
                        <td>{{$value['soluong']}}</td>
                        <td>{{number_format(($value['gia'])*($value['soluong']))}}</td>
                        <td class="text-center"><a href="{{ route('deleteCart', ['id'=>$key]) }}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                    </tr>    
                    <?php $tong = $tong+($value['gia'])*($value['soluong'])?>
                @endforeach
                    {{-- <tr>
                        <td colspan="6" class=""><i class="me-3">Thành tiền: {{$tong}}vnđ</i><a href=""><button class="btn btn-primary">Mua({{count($data3)}})</button></a></td>
                    </tr> --}}
            </table>
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-8"></div>
                <div class="col-lg-4 col-sm-4 col-4">
                    <i class="me-3">Thành tiền: {{number_format($tong)}}vnđ.</i><a href="{{Route('dpSelling')}}"><button class="btn btn-primary">Mua({{count($data3)}})</button></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-1 col-sm-1"></div>
</div>
{{-- @include('web_chinh.layout.footter') --}}
@endsection
    
    