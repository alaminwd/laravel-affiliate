<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
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


// Frontend Pages
Route::middleware(['checkAuth'])->group(function () {
  Route::get('/', [FrontendController::class, 'index'])->middleware('track.visitor');
  ;
  Route::get('/about-us', [FrontendController::class, 'about_us']);
  Route::get('/blog', [FrontendController::class, 'blog']);
  Route::get('/single-category/{slug}', [FrontendController::class, 'single_category']);
  Route::get('/single-product/{slug}', [FrontendController::class, 'single_product']);
  Route::get('/product-search', [FrontendController::class, 'productSearch']);
  Route::get('/single-blog/{slug}', [FrontendController::class, 'single_blog']);
  Route::get('/dynamic-page/{slug}', [FrontendController::class, 'show_dynamic_page']);
  Route::get('/contact', [FrontendController::class, 'contact']);
});

// customer login
Route::get('/customer-login', [FrontendController::class, 'customer_login']);
Route::post('/customer-login-post', [FrontendController::class, 'customer_login_post']);

// get All Api Data
Route::get('/get-page', [PageController::class, 'get_page']);
Route::get('/get-web-content', [WebController::class, 'get_web_content']);


// send message
Route::post('/create-message', [MessageController::class, 'create_message']);

Auth::routes();
Route::get('/home', [HomeController::class, 'home']);
Route::get('/logout', [HomeController::class, 'logout']);


Route::middleware(['auth'])->group(function () {
  // user
  Route::get('/users', [UserController::class, 'users']);
  Route::get('/profile', [UserController::class, 'profile']);
  Route::get('/user-list', [UserController::class, 'user_list']);
  Route::post('/user-create', [UserController::class, 'user_create']);
  Route::post('/user-delete', [UserController::class, 'user_delete']);
  Route::post('/profile-update', [UserController::class, 'profile_update']);
  Route::post('/profile-photo', [UserController::class, 'profile_photo']);

  // Customer password
  Route::get('/customer-password', [UserController::class, 'customer_password']);
  Route::post('/customer-password-update', [UserController::class, 'customer_password_update']);

  // categories
  Route::get('/admin-category', [CategoryController::class, 'category']);
  Route::get('/get-category', [CategoryController::class, 'category_list']);
  Route::post('/category-create', [CategoryController::class, 'category_create']);
  Route::post('/category-delete', [CategoryController::class, 'category_delete']);
  Route::post('/category-update', [CategoryController::class, 'category_update']);

  // product description 
  Route::get('/get-desp-suggestions', [ProductController::class, 'getDespSuggestions']);
  // products
  Route::get('/admin-product', [ProductController::class, 'admin_product']);
  Route::get('/get-product', [ProductController::class, 'get_product']);
  Route::get('/get-product-gallery/{product_id}', [ProductController::class, 'get_product_gallery']);
  Route::post('/product-create', [ProductController::class, 'product_create']);
  Route::post('/product-delete', [ProductController::class, 'product_delete']);
  Route::post('/product-update', [ProductController::class, 'product_update']);

  // blog
  Route::get('/add-blog', [BlogController::class, 'add_blog']);
  Route::get('/get-blog', [BlogController::class, 'get_blog']);
  Route::post('/blog-create', [BlogController::class, 'blog_create']);
  Route::post('/blog-delete', [BlogController::class, 'blog_delete']);
  Route::post('/blog-update', [BlogController::class, 'blog_update']);

  // seo
  Route::get('/add-seo', [SEOController::class, 'add_seo']);
  Route::get('/get-seo', [SEOController::class, 'get_seo']);
  Route::post('/seo-create', [SEOController::class, 'seo_create']);
  Route::post('/seo-delete', [SEOController::class, 'seo_delete']);
  Route::post('/seo-update', [SEOController::class, 'seo_update']);

  // blog
  Route::get('/add-page', [PageController::class, 'add_page']);
  Route::post('/page-create', [PageController::class, 'page_create']);
  Route::post('/page-delete', [PageController::class, 'page_delete']);
  Route::post('/page-update', [PageController::class, 'page_update']);

  // message
  Route::get('/messages', [MessageController::class, 'message']);
  Route::get('/get-message', [MessageController::class, 'get_message']);
  Route::post('/delete-message', [MessageController::class, 'delete_message']);
  Route::get('/message/reply', [MessageController::class, 'reply_message']);
  Route::post('/reply-message', [MessageController::class, 'update_message']);

  // Website Content
  Route::get('/edit-web-contents', [WebController::class, 'edit_web_contents']);
  Route::post('/update-web-content', [WebController::class, 'update_web_content']);

  // role controller
Route::get('/role', [RoleController::class, 'role'])->name('role');
Route::post('/role/store', [RoleController::class, 'role_store'])->name('role.store');
Route::post('/assign/role', [RoleController::class, 'assign_role'])->name('assign.role');
Route::get('/remove/role/{user_id}', [RoleController::class, 'remove_role'])->name('remove.role');
Route::get('/role/edit/', [RoleController::class, 'role_edit'])->name('role.edit');
Route::get('/role/delete/{role_id}', [RoleController::class, 'role_delete'])->name('role.delete');
Route::post('/role/update', [RoleController::class, 'role_update'])->name('role.update');
});


Route::get('/delete/visitor/{id}',[HomeController::class, 'delete_visitor'])->name('delete.visitor');
