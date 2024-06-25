@extends('web_chinh.layout.app')
@section('webchinh')
<div class="row bg-white">
    @foreach ($data2 as $key => $value)
    <div class="col-lg-6 col-sm-5 col-12 text-center mt-3">
        <img src="image/{{$value->img}}" class="w-75 h-75 rounded" alt="">
    </div>
    <div class="col-lg-5 col-sm-5 col-12">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('addCart')}}" method="post">
                    @csrf
                <h4>Sản phẩm:<b style="color: rgb(255, 140, 0)">{{$value->tensp}}</b></h4> <hr>
                <input type="hidden" name="tensp" value="{{$value->tensp}}">
                <input type="hidden" name="id" value="{{$value->id}}">
                <h6>{{$value->thongtin}}</h6><hr> 
                <b style="color: rgb(255, 140, 0)"><h4>{{number_format($value->gia)}}đ</h4></b>
                <input type="hidden" name="gia" value="{{$value->gia}}">
                <input type="hidden" name="img" value="{{$value->img}}">
                <hr> 
                    <label for="">Số lượng: </label>
                    <input type="number" name="soluong" min="1" value="1" max="{{$value->soluong}}">
                    <hr>
                    
                    <button class="btn btn-warning text-white" type="submit">Thêm giỏ hàng<i class="fa fa-shopping-cart" ></i></button>
                </form>
                <hr>
                <h5>Mã sản phẩm: <b style="color:rgb(255, 140, 0)">{{$value->id}}</b></h5>
                <hr>
                <h5>Loại: <b style="color:rgb(255, 140, 0)">{{$value->tendanhmuc}}</b></h5>
            </div>
        </div>
        
    </div>
    @endforeach
    <div class="col-1"></div>
    <hr>
    <div class="row">
        <div class="row">
            <div class="col-3 text-center">
                <h3 style="color:rgb(3, 75, 51);" class="text-decoration-underline">Bình luận</h3>
            </div>
        </div>
        <div class="row">
            CMT ở đây
        </div><hr>
    </div>
</div>
@include('web_chinh.layout.footter')

@endsection