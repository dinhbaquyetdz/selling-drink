@extends('admin.layout.app')

@section('content')
<div class="row text-center">
    <form action="{{ route('updatePay', ['id'=>$id]) }}" method="post">
        @csrf
        <select name="thanhtoan" class="form-control">
            <option value="0">Thanh toán</option>
            <option value="0">Đã thanh toán</option>
            <option value="1">Chưa thanh toán</option>
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