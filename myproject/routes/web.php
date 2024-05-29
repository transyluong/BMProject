<?php

use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\hocsinhController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is luong where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $html = "<h1> WELCOME TO HANOI </h1>";
    return $html;
});

Route::get('/greeding', function () {
    
    return view('greeding',['name'=>'JAME']);
});

Route::get('/product', 'App\Http\Controllers\ProductController@index'   
);

Route::get('/login', 'App\Http\Controllers\ProductController@login'   
);

Route::get('/getProducts', 'App\Http\Controllers\ProductController@getProducts'   
);


Route::get('getproductsbyBand','App\Http\Controllers\ProductController@getProductsbyBand')->name('admin.product.getProductsByBand');
route::get('updateProduct/{pid}','App\Http\Controllers\ProductController@editProduct');

Route::post('updateProduct/{pid}','App\Http\Controllers\ProductController@updateProduct');

Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'product'], function(){
       
 
    });
});

Route::get( 'deleteProduct/{pid}','App\Http\Controllers\ProductController@deleteProduct');