@extends('admin.layout.app')

@section('content')
<div class="row text-center">
    <form action="{{ route('updateTT', ['id'=>$id]) }}" method="post">
        @csrf
        <select name="trangthai" class="form-control">
            <option value="0">Trạng thái</option>
            <option value="1">Chưa xác nhận</option>
            <option value="2">Đã xác nhận</option>
            <option value="3">Đang giao</option>
            <option value="4">Đã nhận</option>
        </select>
        
        <button class="btn btn-primary" type="submit">Xác nhận</button>
    </form>
    @if(session('success'))
            <div style="color: rgb(23, 241, 23)">
                {{ session('success') }}
            </div>
        @endif
</div>
@endsection