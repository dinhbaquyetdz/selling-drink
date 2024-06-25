
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>FORGOTPASSWORD</title>
</head>

<body class="" style="width: 100%; height: 100%;">
<div class="container-lg w-100">
    <div class="row mt-5">
        <div class="col-lg-5 col-sm-12">
            <strong> <h1 style="font-family:'Dancing Script';font-size: 100px">Coffee DBQ</h1></strong>
        </div>
        <div class="col-lg-6 col-sm-10 shadow-lg rounded bg-white">
            <h4>Nếu bạn quên mật khẩu, vui lòng nhập vào email của bạn để nhận mã xác nhận.</h4>
        <form action="{{route('sendmail')}}" method="POST" class="p-1">
            @csrf
            <input type="text" class="form-control" name="email" placeholder="Nhập email">
            <button type="submit" class="btn btn-primary mt-3">Gửi</button>
            <a href="{{route('displayLogin')}}"><button type="button" class="btn mt-3">Login</button></a>
        </form>
        @if ($errors->any())
            <div class="">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red; list-style: none;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        <div class="col-lg-1 col-sm-12"></div>
    </div>
    
</div>
</body>
</html>