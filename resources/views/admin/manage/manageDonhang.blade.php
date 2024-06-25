@extends('admin.layout.app')

@section('content')
    

<div class="row mt-5">
    <div class="row text-white">
      <div class="col-lg-3 col-sm-3 col-12">
        <h2><strong>Đơn hàng</strong></h2>
      </div>
      <div class="col-lg-6 col-sm-3 col-12">

      </div>
      <div class="col-lg-3 col-sm-6 col-12">
        <form class="d-flex" role="search">
          <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
          <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>
    </div>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">tensp</th>
          <th scope="col">Ảnh</th>
          {{-- <th scope="col">Loai</th> --}}
          <th scope="col">Tổng tiền</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Ngày đặt</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Thanh toán</th>
          <th scope="col" class="text-center" colspan="3">Cập nhật</th>
        </tr>
      </thead>
      <tbody>
        @if (empty($data))
            <h4>Khách hàng này chưa mua sản phẩm nào!</h4>
        @else
        @foreach ($data as $key => $value )
          
        
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{$value->tensp}}</td>
          <td><img src="/image/{{$value->img}}" alt="" style="width: 50px;"></td>
          <td>{{$value->gia}}</td>
          <td>{{$value->phone}}</td>
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
          <td>{{$value->thanhtoan == 1 ? "Chưa thanh toán" : "Đã thanh toán"}}</td>
          <td> <a href="{{ route('dpUpdateTT', ['id'=>$value->id])}}"><button type="button" class="btn btn-warning">Trạng thái</button></a></td>
           <td><a href="{{ route('dpUpdatePay', ['id'=>$value->id])}}"><button type="button" class="btn btn-info">Thanh toán</button></a>
            <td>
              <form action="{{ route('deleteDonhang', ['id'=>$value->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="id_khachhang" value="{{$value->id_khachhang}}">
                <button type="submit" class="btn btn-danger">Xóa</button>
              </form>
            </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection