<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('login',[userController::class,"displayLogin"])->name('displayLogin');
Route::get('logout',[userController::class,"Logout"])->name('Logout');
Route::post('login',[userController::class,"Login"])->name('login');
Route::get('register',[userController::class,"displayRegister"])->name('displayRegister');
Route::post('register',[userController::class,"Register"])->name('Register');
Route::get('',[productController::class,"index"])->name("index");
Route::get('ForgotPassword',[userController::class,"dpForgotpass"])->name('dpForgotpass');
Route::post('updatePass',[userController::class,"updatePass"])->name('updatePass');
//Email
Route::post('sendmail',[userController::class,"sendmail"])->name('sendmail');
Route::get('checkCode/{token}',[userController::class,"checkCode"])->name('checkCode');
//check login cho web chính
Route::prefix('/')->middleware('auth')->group(function(){
    Route::get('display-info',[userController::class,"dpInfo"])->name('dpInfo');
    //---Hiển thị sản phẩm---
    Route::get('dpAllProduct',[productController::class,"dpAllProduct"])->name('dpAllProduct');
    Route::get('product{id}',[productController::class,'dpProduct'])->name('dpProduct');
    Route::get('CTproduct{id}',[productController::class,'dpCTProduct'])->name('dpCTProduct');
    //---HIển thị giỏ hàng---
    Route::get('displayCart',[cartController::class,"dpCart"])->name("dpCart");
    Route::post('addCart',[cartController::class,"addCart"])->name("addCart");
    Route::get('deleteCart/{id}',[cartController::class,"deleteCart"])->name("deleteCart");
    //---Mua hàng---------
    Route::get('selling',[cartController::class,'dpSelling'])->name('dpSelling');
    Route::post('selling',[cartController::class,'sell'])->name('sell');
    //---Update thông tin user------------
    Route::post('update-user/{id}',[userController::class,'updateUser'])->name('updateuser');
});


// -----------------------admin-----------------------------------
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/adminHome',[adminController::class,"adminHome"])->name('adminHome');
    // Route::get('/content',[adminController::class,"hd"])->name('content');
    //Hiển thị các trang quản lý
    Route::get('/managentProduct',[adminController::class,"dpProduct"])->name('managentProduct');
    Route::get('/managentMember',[adminController::class,"dpMember"])->name('dpMember');
    Route::get('/managentDonhang/{id}',[adminController::class,"dpDonhang"])->name('dpDonhang');
    Route::get('/managentDanhmuc',[adminController::class,"dpDanhmuc"])->name('dpDanhmuc');
    //Thêm, sửa, xóa sản phẩm
    Route::get('/addProduct',[productController::class,"dpFormAddProduct"])->name("dpFormAddProduct");
    Route::post('/addProduct',[productController::class,"AddProduct"])->name("AddProduct");
    Route::get('/updateProduct/{id}',[productController::class,"formUpdatePr"])->name("formUpdatePr");
    Route::post('/updateProduct/{id}',[productController::class,"updateProduct"])->name("updateProduct");
    Route::get('/deleteProduct/{id}',[productController::class,"deleteProduct"])->name("deleteProduct");
    //Thêm, sửa, xóa danh mục
    Route::get('/addDanhmuc',[adminController::class,"dpFormAddDanhmuc"])->name("dpFormAddDanhmuc");
    Route::post('/addDanhmuc',[adminController::class,"addDanhmuc"])->name("addDanhmuc");
    Route::get('/updateDanhmuc/{id}',[adminController::class,"FormUpdateDanhmuc"])->name("FormUpdateDanhmuc");
    Route::post('/updateDanhmuc/{id}',[adminController::class,"updateDanhmuc"])->name("updateDanhmuc");
    Route::get('/deleteDanhmuc/{id}',[adminController::class,"deleteDanhmuc"])->name("deleteDanhmuc");
    //Update trạng thái đơn hàng
    Route::get('/updateTrangthai/{id}',[adminController::class,"dpUpdateTT"])->name("dpUpdateTT");
    Route::post('/updateTrangthai/{id}',[adminController::class,"updateTT"])->name("updateTT");
    //Update thanh toán đơn hàng
    Route::get('/updatePay/{id}',[adminController::class,"dpUpdatePay"])->name("dpUpdatePay");
    Route::post('/updatePay/{id}',[adminController::class,"updatePay"])->name("updatePay");
    //Xóa đơn hàng
    Route::post('/deleteDonhang/{id}',[adminController::class,"deleteDonhang"])->name("deleteDonhang");
});
