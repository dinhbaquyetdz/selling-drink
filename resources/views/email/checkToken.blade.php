
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
            <h4>Vui lòng nhập mã xác nhận gồm 6 chữ số đã được gửi đến email của bạn.</h4>
        <form action="{{route('checkCode',['token'=>$token])}}" method="get" class="p-1">
            @csrf
            <input type="hidden" name="code" value="{{$code}}">
            <input type="hidden" name="email" value="{{$email}}">
            <input type="text" class="form-control" name="code_mail" placeholder="Nhập mã xác nhận">
            <button type="submit" class="btn btn-primary mt-3">Kiểm tra</button>
            {{-- <a href="{{route('displayLogin')}}"><button type="button" class="btn mt-3">Login</button></a> --}}
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
        @if($message = Session::get('error'))
            <div style="color: red; list-style: none;">
                {{-- <button type="button" class="close" data-dismiss="alert">x</button> --}}
                {{ $message }}
            </div>
        @endif
        </div>
        <div class="col-lg-1 col-sm-12"></div>
    </div>
    
</div>
</body>
</html>