{{-- content --}}
<div class="col-sm-9 col-12">
    <div class="row mb-5" style="height: 100px">
      <div class="col-lg-3 col-6">
        <div class="row">
          <div class="col-12 w-75 ms-3 h-100 shadow p-3 mb-1 bg-primary-subtle rounded text-center ">
            <strong>Sản phẩm</strong>
            <i class="fa fa-glass" aria-hidden="true"></i>
            <?php 
              $sp = 0;
              $dt = 0;
            ?>
            @foreach($data1 as $key => $value)
            <?php
            $sp = $sp+$value->soluong
            ?>
            @endforeach
            <p>{{$sp}}</p>
            
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="row">
          <div class="col-12  w-75 ms-3 h-100 shadow p-3 mb-1 bg-success-subtle rounded text-center">
            <strong>Đơn hàng</strong>
            <i class="fa fa-shopping-cart"></i>
            <p>{{count($data3)}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="row">
          <div class="col-12  w-75 ms-3 h-100 shadow p-3 mb-1 bg-info-subtle rounded text-center">
            <strong>Thành viên</strong>
            <i class="fa fa-user" aria-hidden="true"></i>
            <p>{{count($data2)}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="row">
          
          <div class="col-12  w-75 ms-3 h-100 shadow p-3 mb-1 bg-body-secondary rounded text-center">
            <strong>Doanh thu</strong>
            <i class="fa fa-dollar" aria-hidden="true"></i>
            @foreach($data3 as $key => $value)
            <?php
            $dt = $dt+$value->gia
            ?>
            @endforeach
            <p>{{number_format($dt)}}vnđ</p>
          </div>
        </div>
      </div>
      <hr class="m-t3" style="color: rgb(169, 151, 151)">
    </div>
    <div class="row" style="height: 50px"></div>
    
  {{-- end-content --}}