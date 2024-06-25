@extends('admin.layout.app')

@section('content')
    

<div class="row mt-5">
    <div class="row text-white">
      <div class="col-lg-3 col-sm-3 col-12">
        <h2><strong>Thành viên</strong></h2>
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
          <th scope="col">Họ và tên</th>
          <th scope="col">email</th>
          <th scope="col">giới tính</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Đơn hàng</th>
          <th scope="col" class="text-center" colspan="2">Setting</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $key => $value )
          
        
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{$value->name}}</td>
          <td>{{$value->email}}</td>
          <td>{{$value->gender == 1 ? 'nam' : 'nữ'}}</td>
          <td>{{$value->address}}</td>
          <td><a href="{{ route('dpDonhang', ['id'=>$value->id]) }}"><button type="button" class="btn btn-info">Đơn hàng</button></a></td>
          <td class="text-center"><a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
           {{-- <td> <button type="button" class="btn btn-info">Sửa</button> --}}
            {{-- </td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection