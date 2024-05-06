<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Livewire\AdminOrderDetail;
use App\Livewire\AdminOrders;
use App\Livewire\Allcategories;
use App\Livewire\AuthForm;
use App\Livewire\Brand;
use App\Livewire\Category;
use App\Livewire\ChangeAdminPassword;
use App\Livewire\ChangePassword;
use App\Livewire\Checkout;
use App\Livewire\Createbrand;
use App\Livewire\Createcategory;
use App\Livewire\Createproduct;
use App\Livewire\Createsubcategory;
use App\Livewire\Dashboard;
use App\Livewire\Homepage;
use App\Livewire\OrderDetail;
use App\Livewire\Product;
use App\Livewire\Productdetail;
use App\Livewire\Products;
use App\Livewire\Profile;
use App\Livewire\Subcategory;
use App\Livewire\Thanks;
use App\Livewire\Updatebrand;
use App\Livewire\Updatecategory;
use App\Livewire\Updateproduct;
use App\Livewire\Updatesubcategory;
use App\Livewire\UserLogin;
use App\Livewire\UserRegister;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

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


Route::get('/',Homepage::class)->name('home');
Route::get('/products/{categorySlug?}',Products::class)->name('products');
Route::get('/product-detail/{slug}',Productdetail::class)->name('product.detail');
Route::get('/all-categories',Allcategories::class)->name('all.categories');


Route::group(['prefix' => ''],function(){

    Route::group(['middleware' => 'guest' ],function(){

        Route::get('/login',UserLogin::class)->name('user.login');
        Route::get('/register',UserRegister::class)->name('user.register');

    });

    Route::group(['middleware' => 'auth' ],function(){

        Route::get('/logout',[AuthForm::class,'logout'])->name('user.logout');
        Route::get('/checkout',Checkout::class)->name('checkout');
        Route::get('/thanks',Thanks::class)->name('thanks');
        Route::get('/profile',Profile::class)->name('user.profile');
        Route::get('/order-detail/{orderId}',OrderDetail::class)->name('user.order.detail');
    });

    // Route::get('/getSlug',function (Request $request){

    //     $slug = '';

    //     if(!empty($request->title)) {
    //         $slug = Str::slug($request->title);
    //     }

    //     return response()->json([
    //         'status' => true,
    //         'slug' => $slug,
    //     ]);

    // })->name('getSlug');

});



Route::group(['prefix' => 'admin'],function(){

    Route::group(['middleware' => 'admin.guest' ],function(){

        Route::get('/login',[LoginController::class,'index'])->name('admin.login');

    });

    Route::group(['middleware' => 'admin.auth' ],function(){

        Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');
        Route::get('/dashboard',Dashboard::class)->name('admin.dashboard');
        Route::get('/change-password',ChangeAdminPassword::class)->name('admin.change-password');
        Route::get('/category',Category::class)->name('admin.category');
        Route::get('/create-category',Createcategory::class)->name('admin.create-category');
        Route::get('/update-category/{id}',Updatecategory::class)->name('admin.update-category');
        Route::get('/sub-category',Subcategory::class)->name('admin.subcategory');
        Route::get('/create-subcategory',Createsubcategory::class)->name('admin.create-subcategory');
        Route::get('/update-subcategory/{id}',Updatesubcategory::class)->name('admin.update-subcategory');
        Route::get('/brand',Brand::class)->name('admin.brand');
        Route::get('/create-brand',Createbrand::class)->name('admin.create-brand');
        Route::get('/update-brand/{id}',Updatebrand::class)->name('admin.update-brand');
        Route::get('/product',Product::class)->name('admin.product');
        Route::get('/create-product',Createproduct::class)->name('admin.create-product');
        Route::get('/update-product/{id}',Updateproduct::class)->name('admin.update-product');
        Route::get('/orders',AdminOrders::class)->name('admin.orders');
        Route::get('/order-detail/{orderId}',AdminOrderDetail::class)->name('admin.order.detail');
        Route::get('/users',Users::class)->name('admin.users');
    });

    // Route::get('/getSlug',function (Request $request){

    //     $slug = '';

    //     if(!empty($request->title)) {
    //         $slug = Str::slug($request->title);
    //     }

    //     return response()->json([
    //         'status' => true,
    //         'slug' => $slug,
    //     ]);

    // })->name('getSlug');

});

