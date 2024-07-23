<style>
.img{
    display:block;
	transition: all .3s ease;
}
.img:hover{
    position: relative;
    transform: scale(1.02);
}
.slide{
    background-color:rgb(74, 36, 3);
    color: white
}
.sp:hover{
    position: relative;
    transition: all .5s ease;
    transform: scale(1.04);
}
</style>
<div class="row p-1 mb-2 shadow slide">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
                <div class="col-12 col-lg-6 m-0 p-2">
                    <div class="row">
                        <div class="col-12 w-100 h-100 text-center">
                            <a href="" class="img"><img src="image/gt_coffee.jpg" class="h-100 w-100 rounded " alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 ">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-12 col-lg-8">
                            <b><h3 style="font-family:angel" class="mgs">
                                Cà phê hương chồn, hương thơm hảo hạng.
                                Mang đến cảm giác thư thái thoải mái quý phái lịch lãm.
                            </h3>
                            </b>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
                <div class="col-12 col-lg-6 m-0 p-2">
                    <div class="row">
                        <div class="col-12 w-100 h-100 text-center">
                            <a href="" class="img"><img src="image/tra1.jpg" class="h-100 w-100 rounded " alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 ">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-12 col-lg-8">
                            <b><h3 style="font-family:angel" class="mgs">
                                Các loại trà luôn là lựa chọn hàng đầu cho việc thư giãn.
                                Mang đến cảm giác thư thái thoải.
                            </h3>
                            </b>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
                
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
                <div class="col-12 col-lg-6 m-0 p-2">
                    <div class="row">
                        <div class="col-12 w-100 h-100 text-center">
                            <a href="" class="img"><img src="image/sinhto.jpg" class="h-100 w-100 rounded " alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row"></div>
                    <div class="row ">
                        <div class="col-lg-1"></div>
                        <div class="col-12 col-lg-8">
                            <b><h3 style="font-family:angel" class="mgs">
                                Sinh tố hoa quả được lựa chọn hàng đầu trong việc giải khát,
                                 bổ sung các vitamin tốt cho sức khỏe khách hàng
                            </h3>
                            </b>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
                
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>
<div class="row">
<h3 class="text-white" style="font-family:'Dancing Script'">Sản phẩm bán chạy</h3><hr class="text-white">
</div>
<div class="row " style="background-color:rgb(130, 74, 5)">
    @foreach ($data as $key => $value )
    <div class="col-4 col-lg-2 col-sm-4 my-2">
        <div class="row">
            <div class="col-12 w-100 h-100 text-center shadow-sm sp" style="background-color:bisque">
                <a href="{{ route('dpCTProduct', ['id'=>$value->id]) }}">
                    <div class="row">
                        <div class="col-12">
                            <img src="image/{{$value->img}}" class="w-75 mt-1 sp rounded shadow-sm" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-1" style="height: 50px;">
                            <p class="m-0 w-100" ><a href="" class="text-decoration-none"><b>{{$value->tensp}}</b></a></p>    
                        </div>
                    </div>
                    
                    <p>{{number_format($value->gia)}}đ</p>
                    
                </a>
                <form action="{{ route('addCart')}}" method="post">
                    @csrf
                    <input type="hidden" name="tensp" value="{{$value->tensp}}">
                    <input type="hidden" name="id" value="{{$value->id}}">
                    <input type="hidden" name="gia" value="{{$value->gia}}">
                    <input type="hidden" name="img" value="{{$value->img}}">
                    <input type="hidden" name="soluong" value="1">
                    <button class="btn btn-outline-warning" type="submit">Thêm giỏ hàng</button>
                </form>
                
            </div>
        </div>
        
    </div>
    @endforeach
   
   
</div>

