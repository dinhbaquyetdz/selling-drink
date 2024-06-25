<style>
  .dropbtn {
    background-color: #0a0a0a;
    color: white;
    margin: 5px
    font-size: 16px;
    border: none;
  }
  
  .dropdown {
    position: relative;
    display: block;
  }
  .top{
    color: white;
  }
  .top:hover{
    color:rgb(248, 161, 11);
  }
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: rgb(12, 12, 11);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    /* z-index: 1; */
    
  }
  
  .dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown-content a:hover {background-color: antiquewhite; color: black}
  
  .dropdown:hover .dropdown-content {display: block;}
  
  .dropdown:hover .dropbtn {background-color: antiquewhite; color: black}
  </style>
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-sm-12 text-white">
       <strong> <h1 style="font-family:'Dancing Script'">Coffee DBQ</h1></strong>
       <h5>No one can change the past.<br>
       But someone gotta try.</h5>
       <h5 style="font-size: 5px">Cre: MTP</h5>
      </div>
      <div class="col-lg-3 col-sm-12 text-white text-end username">
        <div class="dropdown my-4">
          
          @if (auth()->user())
          <div class="dropstart">
            <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </button>
            <ul class="dropdown-menu m-0 p-0">
              <li><a class="dropdown-item" href="{{Route('dpInfo')}}">Thông tin cá nhân</a></li>
              <li><a class="dropdown-item" href="{{Route('Logout')}}">Logout</a></li>
            </ul>
          </div>
          @else
          <a class=" text-decoration-none top" href="{{Route('displayLogin')}}" style="font-family:'Dancing Script'">
            Đăng nhập
          </a>
          <a class=" text-decoration-none top" href="{{Route('displayRegister')}}" style="font-family:'Dancing Script'">Đăng ký</a>
          {{-- <a class="text-white" href="{{Route('displayLogin')}}" type="button" data-bs-toggle="dropdown" style="font-family:'Dancing Script'">
            Đăng nhập|Đăng kí
          </a> --}}
          @endif
          
          {{-- <ul class="dropdown-menu p-0">
            <li><a class="dropdown-item" href="#">logout</a></li>
          </ul> --}}
        </div>
      </div>
    </div>
    <div class="row sticky-top">
    <div class=" m-0 p-0 post">      
        <ul class="nav bg-black bg-gradient justify-content-center" data-bs-theme="dark">
            <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="{{Route('index')}}">Home</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link "  href="#" role="button" aria-expanded="false">Giới thiệu</a>
            </li>
            <li class="nav-item">
              <li class="nav-item dropdown">
                <div class="dropdown">
                  <a href="{{route('dpAllProduct')}}" class="nav-link "><button class="dropbtn">Menu</button></a>
                  <div class="dropdown-content">
                    @foreach ($data1 as $ke =>$valu )
                    <a href="{{ route('dpProduct', ['id'=>$valu->id]) }}">{{$valu->tendanhmuc}}</a>
                    @endforeach
                    {{-- <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a> --}}
                  </div>
                </div>
              </li>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="#" aria-disabled="true">Liên hệ</a>
            </li>
            {{-- <?php 
              // $count = 0;
            ?>
            @if (is_array($data3))
              $count = count($data3)
            @else
              $count = 0;
            @endif --}}
            <li class="nav-item">
             
              <a class="nav-link " href="{{Route('dpCart')}}" class="text-white text-decoration-none bg-black" style="border-radius: 100%"><i class="fa fa-shopping-cart" style="font-size: 25px"></i><i style="color: rgb(241, 20, 20); font-size: 15px">{{is_array($data3) ? count($data3) : 0}}</i></a>
              {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form> --}}
            </li>
            
        </ul> 
        
        {{-- <div class="row">
          
            <div class=" col-12">
              <div class="row">
               
              </div>
                <div class="row text-center" > 
                  <ul>
                    <strong class="text-white" >
                      <marquee width=25% class="h1" style="font-family:initial">Have a good day!</marquee>
                  </strong>
                  </ul>
                    
                </div>      
            </div>
            <div class="col-lg-8 col-12">
              <ul class="bg-black" style="">
                  <img src="./image/qc_cofe.gif" class="w-75 h-75" alt="">
              </ul>
          </div>
        </div> --}}
        
    </div>
  </div>
   {{-- <div class="row bg-dark bg-gradient text-white mt-1 tool-box">
    <ul class="nav justify-content-center">
      <li class="nav-item me-5">
        <a class="nav-link active" aria-current="page" href="#">Active</a>
      </li>
      <li class="nav-item mx-5">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item mx-5">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item mx-5">
        <a class="nav-link" aria-disabled="true">Disabled</a>
      </li>
    </ul>
   </div> --}}
  
  