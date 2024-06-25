@extends('admin.layout.app')

@section('content')
    

<div class="row mt-5">
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
                <h2>Thêm Danh Mục</h2>
            </div>
            
            <form method="POST" action="{{Route('addDanhmuc')}}">
              @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <input type="text" name="tendanhmuc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Add</button>
                <a href="{{Route('dpDanhmuc')}}"><button type="button" class="btn btn-dark">Back</button></a>
              </form>
        </div>
        <div class="col-sm-3 col-lg-3 col-1"></div>
    </div>
    
  </div>
</div>
@endsection