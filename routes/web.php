<?php

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

Route::get('/', function () {
	$userId = 1; // get this from session or wherever it came from

        if(request()->ajax())
        {
            $items = [];

            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });

            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }

	$product = DB::table('products')->orderBy("created_at","desc")->paginate(8);
	// dd($product);
    return view('home/index',['product' => $product]);
});

Route::get('/list', function () {
	$userId = 1; // get this from session or wherever it came from

        if(request()->ajax())
        {
            $items = [];

            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });

            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }

	$product = DB::table('products')->paginate(12);
	// dd($product);
    return view('product/list',['product' => $product]);
});


Route::get('/detailproduk/{id}', function ($id) {
	$userId = 1; // get this from session or wherever it came from

        if(request()->ajax())
        {
            $items = [];

            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });

            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }

	$product = DB::table('products')->where([['id', '=',$id]])->get();
	// dd($product);
    return view('product/detail',['product' => $product]);
});

Route::get('/cartpage', 'ProductController@Cartproduct');
Route::post('/delete', 'ProductController@delete');
Route::post('/uploadbukti', 'ProductController@uploadbukti');
Route::post('/order', 'ProductController@order');
Route::get('/checkout', 'ProductController@checkout');
Route::get('/pembayaran/{code}', 'ProductController@pembayaran');
Route::get('/track', 'ProductController@track');
Route::get('/about', function () {
	
    return view('product/about');
});
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@add')->name('cart.add');
Route::post('/cart/conditions','CartController@addCondition')->name('cart.addCondition');
Route::delete('/cart/conditions','CartController@clearCartConditions')->name('cart.clearCartConditions');
Route::get('/cart/details','CartController@details')->name('cart.details');
Route::delete('/cart/{id}','CartController@delete')->name('cart.delete');

Route::get('/notif','ProductController@notif');
