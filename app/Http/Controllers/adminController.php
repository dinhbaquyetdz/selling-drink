<?php

namespace App\Http\Controllers;

use App\Models\danhMucModel;
use App\Models\donhangModel;
use App\Models\productModel;
use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class adminController extends Controller
{
    //
    public function hd(){   
        // $data1 = productModel::all();
        // $data2 = userModel::where('role',1)->get();
        // $data3 = donhangModel::all();
        // return view('admin.layout.content',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
        // $data = productModel::all();
        // return view('admin.index',['data'=>$data]);
    }
    public function adminHome(){   
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        return view('admin.index',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
        // $data = productModel::all();
        // return view('admin.index',['data'=>$data]);
    }

    //Hiển thị sản phẩm
    public function dpProduct(){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        // $data = productModel::all();
        $data = productModel::select('product.*','danhmuc.tendanhmuc')
        ->join('danhmuc','product.id_danhmuc','=','danhmuc.id')
        ->get();
        return view('admin.manage.manageProduct',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    //Hiển thị danh mục
    public function dpDanhmuc(){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        $data = danhMucModel::all();
        return view('admin.manage.manageDanhmuc',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    //Hiển thị thành viên
    public function dpMember(){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        $data = userModel::where('role',1)->get();
        return view('admin.manage.manageMember',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    //Hiển thị đơn hàng
    public function dpDonhang($id){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        // dd($id);
        $data = donhangModel::select('donhang.*','product.tensp','product.img')
        ->join('product','donhang.id_sp','=','product.id')
        ->where('donhang.id_khachhang',$id)
        ->get();
        return view('admin.manage.manageDonhang',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
     //Form add danh mục
     public function dpFormAddDanhmuc(){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        return view('admin.manage.addDanhmuc',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    
   
    //Thêm danh mục
    public function addDanhmuc(Request $request){
        danhMucModel::create([
            'tendanhmuc'=>$request->tendanhmuc
        ]);
        return Redirect(Route('dpDanhmuc'));
    }
    //Form update danh mục
    public function FormUpdateDanhmuc($id){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        $data = danhMucModel::where('id',$id)->get();
        return view('admin.manage.updateDanhmuc',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    //Update danh mục
    public function updateDanhmuc(Request $request, $id){
        $request->validate([
            'tendanhmuc'=>'required'
        ],[
            'tendanhmuc.required'=>'Chưa nhập tên danh mục'
        ]);
        danhMucModel::where('id',$id)
        ->update([
            'tendanhmuc'=>$request->tendanhmuc
        ]);
        return Redirect(route('dpDanhmuc'));
    }
    //delete Danh mục
    public function deleteDanhmuc($id){
        danhMucModel::where('id',$id)->delete();
        return Redirect(route('dpDanhmuc'));
    }
    //Form update trạng thái
    public function dpUpdateTT($id){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        return view('admin.manage.updateTrangthai',['id'=>$id,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    //Update trạng thái
    public function updateTT(Request $request,$id){
        
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        donhangModel::where('id',$id)
        ->update(['trangthai'=>$request->trangthai]);
        return Redirect()->back()->with('success', 'Xác nhận thành công!');
    }
    //Form update thanh toán
    public function dpUpdatePay($id){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        return view('admin.manage.updateThanhtoan',['id'=>$id,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    public function updatePay(Request $request,$id){
        
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        donhangModel::where('id',$id)
        ->update(['thanhtoan'=>$request->thanhtoan]);
        return Redirect()->back()->with('success', 'Xác nhận thành công!');
    }
    public function deleteDonhang(Request $request,$id){
        donhangModel::where('id',$id)->delete();
        return Redirect()->back();
    }
}
