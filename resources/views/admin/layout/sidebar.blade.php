{{-- side-bar --}}


<div class="row ">
    <div class="col-sm-3 col-lg-3 col-12 " style="background-color:rgb(58, 73, 106)">
      <div class="row " >
        <div class="col-12 p-0" >
          <hr class="m-0" style="color: rgb(134, 114, 114)">
            <p class="text-center mt-2" style="color: rgb(164, 142, 142)">interface</p>
          <div class="row">
            {{-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
              <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form> --}}
            <ul class="nav flex-sm-column m-0">
            <div class="col-sm-12 col-lg-12 col-4 mb-2">
              <hr class="m-0" style="color: rgb(134, 114, 114)">
              <li class="nav-item h-50 side_content">
                <a class="nav-link" aria-current="page" href="#">Admin Managent </a>
              </li>
            </div>
            <div class="col-sm-12 col-lg-12 col-2 mb-2">
              <hr class="m-0" style="color: rgb(134, 114, 114)">
              <li class="nav-item side_content">
                <a class="nav-link" href="{{Route('managentProduct')}}">Sản phẩm</a>
              </li>
            </div>
            <div class="col-sm-12 col-lg-12 col-2 mb-2">
              <hr class="m-0" style="color: rgb(134, 114, 114)">
              <li class="nav-item side_content">
                <a class="nav-link" href="{{Route('dpDanhmuc')}}">Danh mục</a>
              </li>
            </div>
            {{-- <div class="col-sm-12 col-lg-12 col-2 mb-2">
              <hr class="m-0" style="color: rgb(134, 114, 114)">
              <li class="nav-item side_content">

                <a class="nav-link" href="{{Route('dpDonhang')}}">Đơn hàng</a>
              </li>
            </div> --}}
            <div class="col-sm-12 col-lg-12 col-2 mb-2">
              <hr class="m-0" style="color: rgb(134, 114, 114)">
              <li class="nav-item h-50 side_content">
                <a class="nav-link" href="{{Route('dpMember')}}">Thành viên</a>
              </li>
            </div>
            <div class="col-12 text-center">
              <a href="#" class=" mt-2" style="color: rgb(134, 114, 114)">about me</a>
            </div>
            {{-- <div class="col-12 text-center">
              <a href="#" class=" mt-2" style="color: rgb(211, 172, 172);text-decoration: none">logout</a>
            </div> --}}
          </ul>
          </div>
       
        </div>
      </div>
    </div>
    {{-- end-sidebar --}}