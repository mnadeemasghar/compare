<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/price_list', [App\Http\Controllers\PriceController::class, 'index'])->name('price_list');
Route::post('/update_price_list', [App\Http\Controllers\PriceController::class, 'edit'])->name('update_price_list');

Route::get('/update_item_id', [App\Http\Controllers\FrontendController::class, 'update_item_id'])->name('update_item_id');
Route::get('/getcate', [App\Http\Controllers\FrontendController::class, 'getcate'])->name('getcate');
Route::get('/contact-us', [App\Http\Controllers\FrontendController::class, 'contactus'])->name('contactus');
Route::get('/about-us', [App\Http\Controllers\FrontendController::class, 'aboutus'])->name('aboutus');
Route::get('/services', [App\Http\Controllers\FrontendController::class, 'sitemap'])->name('sitemap');
Route::get('/blog', [App\Http\Controllers\FrontendController::class, 'blog'])->name('blog');
Route::post('/submitContactUs', [App\Http\Controllers\FrontendController::class, 'submitContactUs'])->name('submitContactUs');
// Route::get('/fetch', [App\Http\Controllers\FrontendController::class, 'fetch'])->name('fetch')->middleware('admin');

Route::get('/all-tools', [App\Http\Controllers\FrontendController::class, 'alltools'])->name('alltools');
Route::get('/get-location-by-ip', [App\Http\Controllers\FrontendController::class, 'getlocationbyip'])->name('getlocationbyip');

Route::get('/daraz-tools', [App\Http\Controllers\FrontendController::class, 'daraztools'])->name('daraztools');
Route::get('/daraz-tools/get-daraz-product-data', [App\Http\Controllers\FrontendController::class, 'getdarazdata'])->name('getdarazdata');
// Route::get('/daraz-tools/get-daraz-product-data_for_fetch', [App\Http\Controllers\FrontendController::class, 'getdarazdata_for_fetch'])->name('getdarazdata_for_fetch');

Route::get('/', [App\Http\Controllers\FrontendController::class, 'welcome'])->name('welcome');
Route::get('/search/{search}', [App\Http\Controllers\FrontendController::class, 'search'])->name('search');
Route::get('/url_detail', [App\Http\Controllers\FrontendController::class, 'url_detail'])->name('url_detail');
Route::post('/submail', [App\Http\Controllers\FrontendController::class, 'submail'])->name('submail');

Route::get('/classified', [App\Http\Controllers\ClassifiedController::class, 'index'])->name('classified');
Route::get('/add-new-classified', [App\Http\Controllers\ClassifiedController::class, 'create'])->name('addclassified');

Auth::routes();

Route::get('/posts',[App\Http\Controllers\PostsController::class, 'index'])->name('posts');
Route::get('/edit_post',[App\Http\Controllers\PostsController::class, 'edit'])->name('editpost');
Route::post('/update_post',[App\Http\Controllers\PostsController::class, 'update'])->name('updatepost');
Route::get('/create_post',[App\Http\Controllers\PostsController::class, 'create'])->name('createpost');
Route::post('/store_post',[App\Http\Controllers\PostsController::class, 'store'])->name('storepost');
Route::get('/destroy_post',[App\Http\Controllers\PostsController::class, 'destroy'])->name('destroypost');

Route::get("my_lists", [App\Http\Controllers\ListController::class, 'index'])->name('user.list.index');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-item', [App\Http\Controllers\ItemController::class, 'create'])->name('create-item');
Route::get('/show-item/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('show-item');
Route::get('/store-item', [App\Http\Controllers\ItemController::class, 'store'])->name('store-item');
Route::get('/del-item', [App\Http\Controllers\ItemController::class, 'destroy'])->name('del-item');
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');

Route::get('/store-attribute', [App\Http\Controllers\AttributeController::class, 'store'])->name('store-attribute');
Route::get('/delete-attribute', [App\Http\Controllers\AttributeController::class, 'destroy'])->name('delete-attribute');
Route::get('/show-unique-attributes', [App\Http\Controllers\AttributeController::class, 'show_unique_attributes'])->name('show-unique-attributes');
Route::get('/attributes', [App\Http\Controllers\AttributeController::class, 'index'])->name('attributes');

Route::get('/admin-dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

Route::post('/store_group', [App\Http\Controllers\GroupController::class, 'store'])->name('store_group');
Route::post('/destroy_group', [App\Http\Controllers\GroupController::class, 'destroy'])->name('destroy_group');