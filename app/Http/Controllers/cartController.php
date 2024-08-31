<?php

namespace App\Http\Controllers;

use App\Models\danhMucModel;
use App\Models\donhangModel;
use App\Models\productModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class cartController extends Controller
{
    //
    public function dpCart(){
        $data1 = danhMucModel::all();
        $data2 = productModel::all();
        $data3 = session()->get('cart');
        return view("web_chinh.cart.cart",['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
   
    public function addCart(Request $request){
        // session()->forget('cart');
        // dd('ok');
        $cart = session()->get('cart',[]);
        if(isset($cart[$request->id])){
            $cart[$request->id]['soluong'] = $cart[$request->id]['soluong'] + $request->soluong;
        }else{
            $cart[$request->id] = [
                'id'=>$request->id,
                'tensp'=>$request->tensp,
                'soluong'=>$request->soluong,
                'gia'=>$request->gia,
                'img'=>$request->img
            ];
        }
        
        session()->put('cart', $cart);
        return Redirect(Route('dpCart'));
    }
    public function updateCart(Request $request){
        if($request->id && $request->soluong){
            $cart = session()->get('cart');
            $cart[$request->id]['soluong']=$request->soluong;
            session()->put('cart',$cart);
            
            return redirect(Route('dpCart'));
        }
    }
    public function deleteCart($id){
        if($id){
            $cart = session()->get('cart');
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
        return redirect(Route('dpCart'));
    }
    //-------------------------sell--------------
    public function dpSelling(){
        $data1 = danhMucModel::all();
        $data2 = productModel::all();
        $data3 = session()->get('cart');
        return view("web_chinh.cart.muahang",['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    public function sell(Request $request){
        $request->validate([
            'phone'=>'min:10|max:10'
        ],[
            'phone.min'=>"Số điện thoại phải 10 số",
            'phone.max'=>'Số điện thoại phải 10 số'
        ]);
        $cart=session()->get('cart');
        foreach($cart as $key => $value){
            donhangModel::create([
                'id_khachhang'=>$request->id_khachhang,
                'id_sp'=>$value['id'],
                'soluong'=>$value['soluong'],
                'gia'=>$value['gia']*$value['soluong'],
                'phone'=>$request->phone,
                'address'=>$request->address,
                'ngaydat'=>date('Y-m-d H:i:s'),
                'trangthai'=>1,
                'thanhtoan'=>1
            ]);
            unset($cart[$key]);
            session()->put('cart',$cart);
        }

        return redirect()->back()->with('alert','hello');
    }
}
