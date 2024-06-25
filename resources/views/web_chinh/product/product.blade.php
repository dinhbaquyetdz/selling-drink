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

.img{
    display:block;
	transition: all .3s ease;
}
.img:hover{
    position: relative;
    transform: scale(1.01);
}
.sp:hover{
    position: relative;
    transition: all .5s ease;
    transform: scale(1.05);
}

</style>
@extends('web_chinh.layout.app')
@section('webchinh')
<div class="row bg-white">
    <div class="col-lg-3 col-sm-3 col-12 bg-secondary-subtle">
        <div class="row fixed">
            <div class="col-12 text-center dm">
                <h3>Loại</h3>
            </div>
        </div>
        <hr>
        <div class="row sticky-top">
            @foreach ($data1 as $key => $value )
            <div class="col-lg-12 col-sm-12 col-4 loai">
                <ul class="nav flex-sm-column m-0">
                    {{-- <div class="col-sm-12 col-lg-12 col-4 mb-2"> --}}
                      {{-- <hr class="m-0" style="color: rgb(134, 114, 114)"> --}}
                      <li class="nav-item h-50">
                        <a class="nav-link" aria-current="page" href="{{ route('dpProduct', ['id'=>$value->id]) }}">{{$value->tendanhmuc}}</a>
                      </li>
                    {{-- </div> --}}
                </ul>
            </div>
            @endforeach
            
        </div>
    </div>
    <div class="col-9">
        <div class="row">
            @foreach ($data2 as $key => $value )
            <div class="col-lg-4 col-sm-4 col-6 my-2">
                <div class="row">
                    <div class="col-12 w-100 h-100 text-center shadow-sm sp" style="background-color:bisque">
                        <a href="{{ route('dpCTProduct', ['id'=>$value->id]) }}">
                            <div class="row">
                                <div class="col-12">
                                    <img src="image/{{$value->img}}" class="w-75 mt-1 rounded shadow-sm sp" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-1" style="height: 50px;">
                                    <p class="m-0 w-100" ><a href="" class="text-decoration-none"><b>{{$value->tensp}}</b></a></p>    
                                </div>
                            </div>
                            
                            <p>{{number_format($value->gia)}}đ</p>
                        </a>
                        <a href="{{ route('dpCTProduct', ['id'=>$value->id]) }}">
                            <button class="btn btn-outline-warning">Thêm giỏ hàng</button>
                        </a>
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('web_chinh.layout.footter')
@endsection

