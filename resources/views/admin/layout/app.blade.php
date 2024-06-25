<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css//admin.css">
    <title>Admin_Home</title>
</head>
<style>
.side_content>a{
  color: whitesmoke;
}
.side_content>a:hover{
  color: black;
}
.side_content>a:focus{
  /* background-color:rgb(239, 186, 117); */
  color: rgb(203, 242, 64);

}
body{
  width: 100%;
 background-color: rgb(47, 72, 102)
}
</style>
<body class="m-0 p-0">
    <div class="container-fluid">
        @include('admin.layout.header')

        @include('admin.layout.sidebar')
        
        @include('admin.layout.content')
        @yield('content')
    </div>
</body>
</html>