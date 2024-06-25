@extends('admin.layout.app')

@section('content')
    

<div class="row mt-5">
    <div class="row text-white">
      <div class="col-lg-3 col-sm-3 col-12">
        <h2><strong>Danh mục</strong></h2>
      </div>
      <div class="col-lg-6 col-sm-3 col-12">

      </div>
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="row">
          <div class="col-lg-3 col-6">
            <a href="{{Route('dpFormAddDanhmuc')}}">
              <button class="btn btn-success">Add</button></a>
            </a>
            
          </div>
          <div class="col-lg-9 col-6">
            <form class="d-flex" role="search">
              <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
              <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên danh mục</th>
          <th scope="col" class="text-center" colspan="2">Setting</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $key => $value )
          
        
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{$value->tendanhmuc}}</td>
          <td><a href="{{ route('FormUpdateDanhmuc', ['id'=>$value->id]) }}"><button type="button" class="btn btn-info">Sửa</button></a> </td>
           <td><a href="{{ route('deleteDanhmuc', ['id'=>$value->id]) }}"><button type="button" class="btn btn-danger">Xóa</button></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection