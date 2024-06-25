<?php

namespace App\Http\Controllers;

use App\Models\danhMucModel;
use App\Models\donhangModel;
use App\Models\productModel;
use App\Models\userModel;
use Illuminate\Http\Request;
use Auth;
class productController extends Controller
{
    /*-------------------------Web chính------------------------------------------*/
    //hiện thị sản phẩm trang web chính
    public function index(){
        $data = productModel::orderBy('gia')->limit(6)->get();
        $data1 = danhMucModel::all();
        $data3 = session()->get('cart');
        return view('web_chinh.index',['data'=>$data,'data1'=>$data1,'data3'=>$data3]);
    }
    //hiển thị toàn bộ danh sách sản phẩm 
    public function dpAllProduct(){
        // if(Auth::check()){
            $data1 = danhMucModel::all();
            $data2 = productModel::all();
            $data3 = session()->get('cart');
            return view('web_chinh.product.product',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
        // }else{
        //     return Redirect(Route('displayLogin'));
        // }
       
    }
    //hiển thị sanh sách sản phẩm theo danh mục
    public function dpProduct($id){
        // if(Auth::check()){
            $data1 = danhMucModel::all();
            $data2 = productModel::where('id_danhmuc',$id)->get();
            $data3 = session()->get('cart');
            return view('web_chinh.product.product',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
        // }else{
        //     return Redirect(Route('displayLogin'));
        // }
       
    }
    //Hiển thị chi tiết sản phẩm
    public function dpCTProduct($id){
        // if(Auth::check()){
            $data1 = danhMucModel::all();
            $data2 = productModel::select('product.*','danhmuc.tendanhmuc')
            ->join('danhmuc','product.id_danhmuc','=','danhmuc.id')
            ->where('product.id',$id)
            ->get();
            $data3 = session()->get('cart');
            return view('web_chinh.product.CTproduct',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
        // }else{
        //     return Redirect(Route('displayLogin'));
        // }
       
    }

    /*---------------------------------Admin----------------------------------------------------*/
    //Form add sản phẩm
    public function dpFormAddProduct(){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        $data = danhMucModel::all();
        return view('admin.manage.addProducts',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    //Thêm sản phẩm
    public function AddProduct(Request $request){
        // dd($request);
       $request->validate([
            'tensp'=>'required',
            'soluong'=>'required',
            'gia'=>'required',
            'loai'=>'required',
            'upload_file'=>'required',
            'thongtin'=>'required'
       ],[
            'tensp.required'=>'Chưa nhập tên sản phẩm',
            'soluong.required'=>'Chưa nhập số lượng',
            'gia.required'=>'Chưa nhập giá',
            'loai.required'=>'Chưa chọn loại sản phẩm',
            'upload_file.required'=>'Chưa chọn ảnh mô tả',
            'thongtin.required'=>'Chưa nhập thông tin sản phẩm'
       ]);
       if($request->hasFile('upload_file')){
        $file=$request->file('upload_file');
        $extension = $request->file('upload_file')->extension();
        $file_name = time().'-product'.'.'.$extension;
        $file->move('image',$file_name);
        
       }
       productModel::create([
        'tensp'=>$request->tensp,
        'id_danhmuc'=>$request->loai,
        'soluong'=>$request->soluong,
        'gia'=>$request->gia,
        'thongtin'=>$request->thongtin,
        'img'=>$file_name
       ]);
       return Redirect(Route('managentProduct'));
    }
    //Form update sản phẩm
    public function formUpdatePr($id){
        $data1 = productModel::all();
        $data2 = userModel::where('role',1)->get();
        $data3 = donhangModel::all();
        $data = productModel::select('product.*','danhmuc.tendanhmuc')
        ->join('danhmuc','product.id_danhmuc','=','danhmuc.id')
        ->where('product.id',$id)
        ->get();
        $data4 = danhMucModel::all();
        return view('admin.manage.updateProducts',['data'=>$data,'data4'=>$data4,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    //update sản phẩm
    public function updateProduct(Request $request,$id){
        $request->validate([
            'tensp'=>'required',
            'soluong'=>'required',
            'gia'=>'required',
            'loai'=>'required',
            
            'thongtin'=>'required'
       ],[
            'tensp.required'=>'Chưa nhập tên sản phẩm',
            'soluong.required'=>'Chưa nhập số lượng',
            'gia.required'=>'Chưa nhập giá',
            'loai.required'=>'Chưa chọn loại sản phẩm',
            
            'thongtin.required'=>'Chưa nhập thông tin sản phẩm'
       ]);
       if($request->hasFile('upload_file')){
        $file=$request->file('upload_file');
        $extension = $request->file('upload_file')->extension();
        $file_name = time().'-product'.'.'.$extension;
        $file->move('image',$file_name);
        productModel::where('id',$id)
        ->update([
            'tensp'=>$request->tensp,
            'id_danhmuc'=>$request->loai,
            'soluong'=>$request->soluong,
            'gia'=>$request->gia,
            'thongtin'=>$request->thongtin,
            'img'=>$file_name
        ]);
       }else{
        productModel::where('id',$id)
        ->update([
            'tensp'=>$request->tensp,
            'id_danhmuc'=>$request->loai,
            'soluong'=>$request->soluong,
            'gia'=>$request->gia,
            'thongtin'=>$request->thongtin,
            
        ]);
       }
       return Redirect(Route('managentProduct'));
    }
     //Xóa sản phẩm
     public function deleteProduct($id){
        productModel::where('id',$id)->delete();
        return Redirect(Route('managentProduct'));
    }
}
