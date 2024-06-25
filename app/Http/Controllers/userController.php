<?php

namespace App\Http\Controllers;

use App\Mail\SampleMail;
use App\Models\danhMucModel;
use App\Models\donhangModel;
use App\Models\productModel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\userModel;
use Hash;
use Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Str;
use function PHPUnit\Framework\throwException;

class userController extends Controller
{
    //
   
    public function menu(){}
    public function displayLogin(){
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return redirect(Route('index'));
            }elseif(Auth::user()->role == 2){
                return redirect(Route('adminHome'));
            }
        }else{
            return view("login");
        }
        
    }

    public function displayRegister(){
        return view("register");
    }

    public function Register(Request $request){
        $request->validate([
            'email'=>'unique:user',
            'password'=>'min:8',
            'repassword'=>'required_with:password|same:password'
        ],[
            'email.unique'=>'Tài khoản đã tồn tại',
            'password.min'=>'Mật khẩu phải từ 8 ký tự',
            'repassword.required_with'=>'Chưa xác nhận mật khẩu',
            'repassword.same'=>'Mật khẩu nhập lại chưa đúng'
        ]);
        //dd(Hash::make($request->password));
       
            $request->merge(['password'=>Hash::make($request->password)]);
            $request->merge(['repassword'=>Hash::make($request->repassword)]);
           try{
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'address'=>$request->address,
                'dateOfBirth'=>$request->dateOfBirth,
                'gender'=>$request->gender,
                'role'=>1
            ]);
           }catch(\Throwable $th){
                dd($th);
           }
      
       
       return redirect(Route('displayLogin'));
        
    }
    public function Logout(){
        Auth::logout();
        return redirect(Route('index'));
    }
    public function Login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->role == 1){
                return redirect(Route('index'));
            }elseif(Auth::user()->role == 2){
                return redirect(Route('adminHome'));
            }
        }
        return Redirect()->back()->with('error','Tài khoản hoặc mật khẩu không hợp lệ');
    }
    public function dpInfo(){
        // if(Auth::check()){
        $data = productModel::all();
        $data1 = danhMucModel::all();
        $data3 = session()->get('cart');
        $data4 = userModel::where('id',Auth::user()->id)->get();
        $data5 = donhangModel::select('donhang.*','product.tensp','product.img')
        ->join('product','donhang.id_sp','=','product.id')
        ->get();
        return view('web_chinh.user.thongtin',['data'=>$data,'data1'=>$data1,'data3'=>$data3,'data4'=>$data4,'data5'=>$data5]);
        // }else{
        //     return Redirect(Route('displayLogin'));
        // }
       
    }
    public function updateUser(Request $request, $id){
        
        // return "<script> alert('alo');</script>";
        userModel::where('id',$id)
        ->update([
            'name'=>$request->name,
            // 'email'=>$request->email,
            'address'=>$request->address,
            'dateOfBirth'=>$request->dateOfBirth,
            'gender'=>$request->gender
        ]);
        return Redirect(route('dpInfo'));
    }
    public function dpForgotpass(){
        return view('forgotpass');
    }
   public function sendmail(Request $request){
    $request->validate([
        'email'=>'required|exists:user'
    ],[
        'email.required'=>'Vui lòng nhập email',
        'email.exists'=>'Email này chưa được đăng ký tài khoản của chúng tôi.'
    ]);
    $custom = userModel::where('email',$request->email)->first();
    $code = rand(100000,999999);
    $token = strtoupper(Str::random(10));
    // dd($code);
    Mail::send('email.sendmail',compact('code'), function($email) use($code,$custom){
        $email->subject('COFFEE_DBQ');
        $email->to($custom->email,$code);
    });

    return view('email.checkToken',['token'=>$token,'code'=>$code,'email'=>$custom->email]);
   }
   public function checkCode(Request $request){
        $request->validate([
            'code'=>'required'
        ],[
            'code.required'=>'Vui lòng nhập mã xác nhận.'
        ]);
        if($request->code_mail == $request->code){
            return view('updatePass',['email'=>$request->email]);
        }
        return Redirect()->back()->with('error','Mã xác nhận không hợp lệ.');
   }
   public function updatePass(Request $request){
    $request->validate([
        'password'=>'required|min:8',
        'repassword'=>'required|same:password'
    ],[
        'password.requỉed'=>'Vui lòng nhập mật khẩu.',
        'password.min'=>'Mật khẩu phải từ 8 ký tự trở lên.',
        'repassword.requỉed'=>'Vui lòng nhập mật khẩu xác nhận.',
        'repassword.same'=>'Mật khẩu nhập lại chưa đúng.'
    ]);
    $request->merge(['password'=>Hash::make($request->password)]);
    // dd($request->email);
        userModel::where('email',$request->email)
        ->update([
            'password'=>$request->password
        ]);
        return Redirect(route('displayLogin'));
   }
}
