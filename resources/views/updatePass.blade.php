
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>UPDATEPASSWORD</title>
</head>

<body class="" style="width: 100%; height: 100%;">
<div class="container-lg w-100">
    <div class="row mt-5">
        <div class="col-lg-5 col-sm-12">
            <strong> <h1 style="font-family:'Dancing Script';font-size: 100px">Coffee DBQ</h1></strong>
        </div>
        <div class="col-lg-6 col-sm-10 shadow-lg rounded bg-white">
            <h4>Cập nhật lại mật khẩu.</h4>
        <form action="{{route('updatePass')}}" method="post" class="p-1">
            @csrf
            <input type="hidden" name="email" value="{{$email}}">
            <div class="form-control">
                <label for="">Nhập mật khẩu:</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-control">
                <label for="">Nhập lại mật khẩu:</label>
                <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
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
        </div>
        <div class="col-lg-1 col-sm-12"></div>
    </div>
    
</div>
</body>
</html>