<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GoogleController;
use Illuminate\Auth\Events\Login;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('admin/dashboard',[AdminController::class,'index']);

// admin category controller
Route::get('admin/category',[CategoryController::class,'index']);
Route::post('admin/category/insert',[CategoryController::class,'insert']);
Route::get('admin/category',[CategoryController::class,'display']);
Route::get('admin/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('admin/category/update',[CategoryController::class,'update']);
Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);


// admin product controller
Route::get('admin/product',[ProductController::class,'index']);
Route::post('admin/product/insert',[ProductController::class,'insert']);
Route::get('admin/product',[ProductController::class,'display']);
Route::get('admin/product/edit/{id}',[ProductController::class,'edit']);
Route::post('admin/product/update',[ProductController::class,'update']);


//slider controller
Route::get('admin/slider',[SliderController::class,'index']);
Route::post('admin/slider/insert',[SliderController::class,'insert']);
Route::get('admin/slider',[SliderController::class,'display']);
Route::get('admin/slider/edit/{id}',[SliderController::class,'edit']);
Route::post('admin/slider/update',[SliderController::class,'update']);



// admin route end

//Front controller
Route::get('/',[FrontController::class,'index']);
Route::get('/more_product',[FrontController::class,'more_product']);
Route::get('/product_detail/{id}',[FrontController::class,'product_detail']);
Route::post('/cart',[FrontController::class,'cart']);
Route::get('/add_to_cart',[FrontController::class,'add_To_cart']);
Route::get('/checkout',[FrontController::class,'checkout']);
Route::get('/delete/{id}',[FrontController::class,'delete']);
Route::post('/place_order',[FrontController::class,'place_order']);
Route::get('/thanks',[FrontController::class,'thanks']);

//my acc route

Route::get('/myaccount',[FrontController::class,'my_account']);
Route::get('/order',[FrontController::class,'order']);
Route::get('/change_pwd',[FrontController::class,'change_pwd']);
Route::post('/update_pwd',[FrontController::class,'update_pwd']);
Route::get('/change_add',[FrontController::class,'change_add']);
Route::post('/update_add',[FrontController::class,'update_add']);


//login controller

Route::get('/login',[UserController::class,'login']);
Route::post('/user_insert',[UserController::class,'user_insert']);
Route::post('/login_verification',[UserController::class,'login_verification']);
Route::get('/logout',[UserController::class,'logout']);
// Route::get('/redirect',[Usercontroller::class,'redirect']);

//socialite

//Login with google Routes
Route::get('login/{service}',[SocialiteController::class,'redirectToProvider']);
Route::get('login/{service}/callback',[SocialiteController::class,'handleProviderCallback']);


//forget password

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//paytm gateway
Route::post('/paytm-callback',[FrontController::class,'paytmCallback']);