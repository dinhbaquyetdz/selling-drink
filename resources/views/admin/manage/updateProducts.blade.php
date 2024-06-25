@extends('admin.layout.app')

@section('content')
    

<div class="row">
    {{-- <div class="row text-white">
      <div class="col-lg-3 col-sm-3 col-12">
        <h2><strong>Danh mục</strong></h2>
      </div>
      <div class="col-lg-6 col-sm-3 col-12">

      </div>
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="row">
          <div class="col-lg-3 col-6">
            <button class="btn btn-success">Add</button></a>
          </div>
          <div class="col-lg-9 col-6">
            <form class="d-flex" role="search">
              <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
              <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="row">
        <div class="col-sm-3 col-lg-3 col-1"></div>
        <div class="col-sm-6 col-lg-6 col-10 shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="row text-center">
                <h2>Sửa Sản Phẩm</h2>
            </div>
            @foreach ($data as $key => $value )
            <form method="POST" action="{{Route('updateProduct',['id'=>$value->id])}}" enctype="multipart/form-data">
              @csrf
              
                
              
                <div class="mb-3">
                 <label for="">Tên sản phẩm:</label>
                  <input type="text" name="tensp" value="{{$value->tensp}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên sản phẩm">
                </div>
                <div class="mb-3">
                 <label for="">Số lượng:</label>
                  <input type="number" name="soluong" value="{{$value->soluong}}" class="form-control" id="exampleInputPassword1" placeholder="Số lượng">
                </div>
                <div class="mb-3">
                   <label for="">Giá:</label>
                    <input type="number" name="gia" value="{{$value->gia}}" class="form-control" id="exampleInputPassword1" placeholder="Giá">
                </div>
                <div class="mb-3">
                    <label for="">Loại:</label>
                    <select name="loai" id="" class="form-control">
                      <option value="{{$value->id_danhmuc}}">{{$value->tendanhmuc}}</option>
                      @foreach ($data4 as $key4 =>$value4 )
                      <option value="{{$value4->id}}">{{$value4->tendanhmuc}}</option>
                      @endforeach
{{--                         
                        <option value="1">Coffe</option>
                        <option value="2">Sinh tố</option>
                        <option value="3">Nước ép</option>
                        <option value="4">Hạt</option> --}}
                    </select>
                </div>
                <div class="mb-3">
                   <label for="">Thông tin:</label>
                  <textarea name="thongtin" class="form-control" id="exampleInputPassword1">{{$value->thongtin}}</textarea>
              </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Chọn ảnh mô tả sản phẩm</label>
                    <input class="form-control" type="file" name="upload_file" id="formFile" value="aaa">
                </div>
                {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <button type="submit" class="btn btn-primary">Sửa</button>
                <a href="{{Route('managentProduct')}}"><button type="button" class="btn btn-dark">Back</button></a>
                @endforeach
              </form>
        </div>
        <div class="col-sm-3 col-lg-3 col-1"></div>
    </div>
    
  </div>
</div>
@endsection