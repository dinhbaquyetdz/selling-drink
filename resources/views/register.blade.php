
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>SIGNIN</title>
</head>
<script>
    var count = 1;
    function checkp() {
     var img=['image/check2.jpg','image/check1.jpg']
     document.getElementById("checkpass").src=img[count];
      count++;
       if(count == 2){
           document.getElementById("pass").setAttribute('type','text');
           document.getElementById("repass").setAttribute('type','text');
           count = 0;
       }if(count == 1){
           document.getElementById("pass").setAttribute('type','password');
           document.getElementById("repass").setAttribute('type','password');
        }
   }
</script>
<body class="bg-success-subtle" style="width: 100%; height: 100%;">
    <div class="container">
        <div class="row my-5">
            <div class="col-1 col-sm-3 col-lg-4"></div>
            <div class="col-10 col-sm-6 col-lg-4 shadow-lg border border-black pt-3 bg-body rounded-5">
                <div class="row">
                    {{-- <p class="h4 text-center position-relative mb-2" style="font-family: Helvetica;"><strong>Chào mừng bạn đến với DBQ_SHOP</strong></p> --}}
                    <p class="h3 position-relative text-center " style="font-family: Verdana; color: rgb(43, 42, 42);">Đăng ký</p>
                </div>
                <div class="row mt-2">
                    <form action="{{ route('Register') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 ">
                                <div class="mb-3">
                                    <input type="text" class="form-control rounded-5 w-100  border border-2 border-black" name="name" placeholder="Họ và tên" required>
                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="row p-0">
                            <div class="col-12">
                                <div class="mb-3 ">
                                    <input type="email" class="form-control rounded-5 w-100  border border-2 border-black" name="email" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0">
                            <div class="col-12">
                                <div class="mb-3 ">
                                    <input type="text" class="form-control rounded-5 w-100  border border-2 border-black" name="address" placeholder="Address" required>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0">
                            <div class="col-12">
                                <label for="">Ngày sinh: </label>
                                <div class="mb-3 ">
                                    <input type="date" class="form-control rounded-5 w-100  border border-2 border-black" name="dateOfBirth" required>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0">
                            <div class="col-12">
                                {{-- <label for="">Giới tính:</label> --}}
                                <div class="mb-3 ">
                                    <input type="radio" name="gender" value="1" checked>Nam
                                    <input type="radio" name="gender" value="2">Nữ
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="password" id="pass" class="form-control rounded-5 w-100 border border-2 border-black" name="password" placeholder="Mật khẩu" required>
                            <input type="password" id="repass" class="form-control mt-3 rounded-5 w-100 border border-2 border-black" name="repassword" placeholder="Nhập lại mật khẩu" required>
                
                        </div>
                       
                        <div class="check">
                            <p><img id="checkpass" src="image/check2.jpg" onclick="checkp()" alt="" style="max-width: 20px;"><label style="position: absolute;">Hiển thị mật khẩu</label></p>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger p-0">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="list-style: none;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- @if($mesage = Session::get('error'))
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong>{{$mesage}}</strong>
                        @endif --}}
                        <div class="mb-3 text-center">
                            <input type="submit" class="form-control rounded-5 w-100 border border-2 border-black btn btn-warning text-white" value="ĐĂNG Ký">
                            <a href="{{Route('displayLogin')}}">Đăng nhập</a>
                        </div>
                    </form>
                    <!-- <a href="#" class="ms-5 text-decoration-none fw-semibold" style="color: green;font-family:Arial, Helvetica, sans-serif;">Quên mật khẩu</a> -->
                    <!-- <div class="row mx-5">
                        <div class="col-4 p-0 "><hr class=" mt-3 w-100" ></div>
                        <div class="col-1 p-0">HOẶC</div> -->
                        <!-- <div class="col-1"></div> -->
                        <!-- <div class="col-4 ms-0"><hr class="ms-0 mt-3 w-100" ></div>
                        <div class="col-3"></div> -->
                        <!-- <p class="fw-normal position-relative"><hr class=" me-2 mt-3 w-25" >HOẶC<hr class="ms-2 mt-3 w-25" ></p> -->
                    <!-- </div>
                    <div class="row ms-5">
                        <div class="col-5 my-2"><a href="#" class="text-decoration-none text-black" ><img src="image/logofb1.png" class="w-25 pt-1 m-0">Facebook</a></div>
                        <div class="col-1"></div>
                        <div class="col-5 my-2"><a href="#" class="text-decoration-none text-black" ><img src="image/logoGG.png" class="w-25 p-0 m-0">Google</a></div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row ms-2">
                        <p class="text-center fw-bold">Bạn chưa có tài khoản? <a href="signup.html">Đăng ký</a></p>
                    </div> -->
                </div>
            </div>
            <div class="col-1 col-sm-3 col-lg-4"></div>
        </div>
    </div>
</body>
</html>