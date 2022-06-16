<?php

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
// URL::forceScheme('https');
Auth::routes();  

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/getdoors', [App\Http\Controllers\catalogController::class, 'index'])->name('index');

// TODO hidden
 Route::get('/shop', [App\Http\Controllers\catalogController::class, 'shop'])->name('shop');
 Route::get('/shop/{id}/model={model}/type={type}', [App\Http\Controllers\catalogController::class, 'show'])->name('model');

Route::get('/service-one/{id}', [App\Http\Controllers\WelcomeController::class, 'serviceone'])->name('serviceone');
Route::get('/getglasses', [App\Http\Controllers\catalogController::class, 'glass'])->name('glass');
Route::get('/contact', [App\Http\Controllers\WelcomeController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [App\Http\Controllers\WelcomeController::class, 'politika'])->name('politika');
Route::get('/feedback', [App\Http\Controllers\WelcomeController::class, 'feedback'])->name('feedback');
Route::get('/services', [App\Http\Controllers\WelcomeController::class, 'services'])->name('services');
Route::get('/stocks', [App\Http\Controllers\WelcomeController::class, 'stocks'])->name('stocks');
Route::get('/about', [App\Http\Controllers\WelcomeController::class, 'about'])->name('about');
Route::get('/partners', [App\Http\Controllers\WelcomeController::class, 'partners'])->name('partners');
Route::get('/completed', [App\Http\Controllers\WelcomeController::class, 'completed'])->name('completed');
Route::get('/completed/{id}', [App\Http\Controllers\WelcomeController::class, 'completedone'])->name('completedone');
Route::post('/application', [App\Http\Controllers\WelcomeController::class, 'app'])->name('app');
Route::post('/comment', [App\Http\Controllers\WelcomeController::class, 'komm'])->name('komm');
Route::post('/tocart', [App\Http\Controllers\catalogController::class, 'addToCart'])->name('addToCart');
Route::post('/delete', [App\Http\Controllers\catalogController::class, 'delItem'])->name('delItem');
Route::post('/order', [App\Http\Controllers\catalogController::class, 'order'])->name('order');
Route::get('/get_service', [App\Http\Controllers\catalogController::class, 'get_service'])->name('get_service');
Route::get('/get_stock', [App\Http\Controllers\catalogController::class, 'get_stock'])->name('get_stock');
Route::get('/cart', [App\Http\Controllers\catalogController::class, 'cart'])->name('cart');
Route::get('/error',function(){
  abort(404);
  abort(500);
});

Route::group(['prefix' => 'admin', 'middleware' => 'Administrator'], function()
{
    Route::get('/', [App\Http\Controllers\adminController::class, 'admin'])->name('admin');

    Route::get('/glass', [App\Http\Controllers\adminController::class, 'glasses'])->name('glasses');
    Route::get('/door', [App\Http\Controllers\adminController::class, 'door'])->name('door');
    Route::get('/color', [App\Http\Controllers\adminController::class, 'color'])->name('color');
    Route::get('/material', [App\Http\Controllers\adminController::class, 'material'])->name('material');
    Route::get('/variation', [App\Http\Controllers\adminController::class, 'variation'])->name('variation');
    Route::get('/category', [App\Http\Controllers\adminController::class, 'category'])->name('category');
    Route::get('/partner', [App\Http\Controllers\adminController::class, 'partner'])->name('partner');
    Route::get('/slider', [App\Http\Controllers\adminController::class, 'slider'])->name('slider');
    Route::get('/shades', [App\Http\Controllers\adminController::class, 'shades'])->name('shades');
    Route::get('/service', [App\Http\Controllers\adminController::class, 'service'])->name('service');
    Route::get('/stock', [App\Http\Controllers\adminController::class, 'stock'])->name('stock');
    Route::get('/banner', [App\Http\Controllers\adminController::class, 'banner'])->name('banner');
    Route::get('/complete', [App\Http\Controllers\adminController::class, 'complete'])->name('complete');

    Route::post('/glass/new', [App\Http\Controllers\adminController::class, 'glass_new'])->name('glass_new');
    Route::post('/door/new', [App\Http\Controllers\adminController::class, 'door_new'])->name('door_new');
    Route::post('/color/new', [App\Http\Controllers\adminController::class, 'color_new'])->name('color_new');
    Route::post('/material/new', [App\Http\Controllers\adminController::class, 'material_new'])->name('material_new');
    Route::post('/variation/new', [App\Http\Controllers\adminController::class, 'variation_new'])->name('variation_new');
    Route::post('/category/new', [App\Http\Controllers\adminController::class, 'category_new'])->name('category_new');
    Route::post('/partner/new', [App\Http\Controllers\adminController::class, 'partner_new'])->name('partner_new');
    Route::post('/slider/new', [App\Http\Controllers\adminController::class, 'slider_new'])->name('slider_new');
    Route::post('/shades/new', [App\Http\Controllers\adminController::class, 'shades_new'])->name('shades_new');
    Route::post('/service/new', [App\Http\Controllers\adminController::class, 'service_new'])->name('service_new');
    Route::post('/stock/new', [App\Http\Controllers\adminController::class, 'stock_new'])->name('stock_new');
    Route::post('/banner/new', [App\Http\Controllers\adminController::class, 'banner_new'])->name('banner_new');
    Route::post('/complete/new', [App\Http\Controllers\adminController::class, 'complete_new'])->name('complete_new');
    Route::post('/complete/foto/new', [App\Http\Controllers\adminController::class, 'complete_foto_new'])->name('complete_foto_new');
    Route::post('/service/foto/new', [App\Http\Controllers\adminController::class, 'service_foto_new'])->name('service_foto_new');

    Route::get('/service/all', [App\Http\Controllers\adminController::class, 'service_all'])->name('service_all');
    Route::get('/stock/all', [App\Http\Controllers\adminController::class, 'stock_all'])->name('stock_all');
    Route::get('/slider/all', [App\Http\Controllers\adminController::class, 'slider_all'])->name('slider_all');
    Route::get('/door/all', [App\Http\Controllers\adminController::class, 'door_all'])->name('door_all');
    Route::get('/color/all', [App\Http\Controllers\adminController::class, 'color_all'])->name('color_all');
    Route::get('/material/all', [App\Http\Controllers\adminController::class, 'material_all'])->name('material_all');
    Route::get('/variation/all', [App\Http\Controllers\adminController::class, 'variation_all'])->name('variation_all');
    Route::get('/category/all', [App\Http\Controllers\adminController::class, 'category_all'])->name('category_all');
    Route::get('/partner/all', [App\Http\Controllers\adminController::class, 'partner_all'])->name('partner_all');
    Route::get('/shades/all', [App\Http\Controllers\adminController::class, 'shades_all'])->name('shades_all');
    Route::get('/banner/all', [App\Http\Controllers\adminController::class, 'banner_all'])->name('banner_all');
    Route::get('/complete/all', [App\Http\Controllers\adminController::class, 'complete_all'])->name('complete_all');

    Route::get('/complete/edit/show/{id}', [App\Http\Controllers\adminController::class, 'complete_open_edit'])->name('complete_open_edit');
    Route::patch('/complete/edit/update/{id}', [App\Http\Controllers\adminController::class, 'complete_edit'])->name('complete_edit');
    Route::delete('/complete/del/{id}', [App\Http\Controllers\adminController::class, 'complete_del'])->name('complete_del');
    Route::post('/foto/del', [App\Http\Controllers\adminController::class, 'complete_foto_del'])->name('complete_foto_del');

    Route::get('/banner/edit/show/{id}', [App\Http\Controllers\adminController::class, 'banner_open_edit'])->name('banner_open_edit');
    Route::patch('/banner/edit/update/{id}', [App\Http\Controllers\adminController::class, 'banner_edit'])->name('banner_edit');
    Route::delete('/banner/del/{id}', [App\Http\Controllers\adminController::class, 'banner_del'])->name('banner_del');

    Route::get('/partner/edit/show/{id}', [App\Http\Controllers\adminController::class, 'partner_open_edit'])->name('partner_open_edit');
    Route::patch('/partner/edit/update/{id}', [App\Http\Controllers\adminController::class, 'partner_edit'])->name('partner_edit');
    Route::delete('/partner/del/{id}', [App\Http\Controllers\adminController::class, 'partner_del'])->name('partner_del');

    Route::get('/shades/edit/show/{id}', [App\Http\Controllers\adminController::class, 'shades_open_edit'])->name('shades_open_edit');
    Route::patch('/shades/edit/update/{id}', [App\Http\Controllers\adminController::class, 'shades_edit'])->name('shades_edit');
    Route::delete('/shades/del/{id}', [App\Http\Controllers\adminController::class, 'shades_del'])->name('shades_del');

    Route::get('/service/edit/show/{id}', [App\Http\Controllers\adminController::class, 'service_open_edit'])->name('service_open_edit');
    Route::patch('/service/edit/update/{id}', [App\Http\Controllers\adminController::class, 'service_edit'])->name('service_edit');
    Route::delete('/service/del/{id}', [App\Http\Controllers\adminController::class, 'service_del'])->name('service_del');
    Route::post('/service/foto/del', [App\Http\Controllers\adminController::class, 'service_foto_del'])->name('service_foto_del');

    Route::get('/stock/edit/show/{id}', [App\Http\Controllers\adminController::class, 'stock_open_edit'])->name('stock_open_edit');
    Route::patch('/stock/edit/update/{id}', [App\Http\Controllers\adminController::class, 'stock_edit'])->name('stock_edit');
    Route::delete('/stock/del/{id}', [App\Http\Controllers\adminController::class, 'stock_del'])->name('stock_del');

    Route::get('/slider/edit/show/{id}', [App\Http\Controllers\adminController::class, 'slider_open_edit'])->name('slider_open_edit');
    Route::patch('/slider/edit/update/{id}', [App\Http\Controllers\adminController::class, 'slider_edit'])->name('slider_edit');
    Route::delete('/slider/del/{id}', [App\Http\Controllers\adminController::class, 'slider_del'])->name('slider_del');

    Route::get('/variation/edit/show/{id}', [App\Http\Controllers\adminController::class, 'variation_open_edit'])->name('variation_open_edit');
    Route::patch('/variation/edit/update/{id}', [App\Http\Controllers\adminController::class, 'variation_edit'])->name('variation_edit');
    Route::delete('/variation/del/{id}', [App\Http\Controllers\adminController::class, 'variation_del'])->name('variation_del');
});