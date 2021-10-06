<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home'          , 'HomeController@index')->name('home');
// Auth::routes();

Route::get('/'                                 , 'FrontController@index');
Route::get('product-details/{id}'              , 'FrontController@productDetails');
Route::post('add-to-cart/{product_id}'         , 'FrontController@addToCart');
Route::post('cart-remove'                      , 'FrontController@cartRemove');
Route::match(['get', 'post'],'checkout/'       , 'FrontController@checkout')->name('checkout');
Route::get('cart'                              , 'FrontController@cartDetails');
Route::post('update-cart/{product_id}'         , 'FrontController@updateCart');
Route::get('product_list/{category_id?}'       , 'FrontController@productList');
Route::get('thankyou'                          , 'FrontController@thankyou');
// Route::get('category/{category_id}'            , 'FrontController@category');

Route::post('register-user'                    , 'FrontController@registerUser');
Route::post('login-user'                       , 'FrontController@loginUser');

Route::get('logout-user'                       , 'FrontController@logOut');

Route::prefix('admin')->group(function(){

    Route::get('/'                          , 'AdminController@index');
    Route::match(['get', 'post'], 'auth'    , 'AdminController@auth')->name('admin.auth');

    Route::group(['middleware'=>'admin'], function(){

        Route::get('dashboard'                                  , 'AdminController@dashboard');

        Route::get('product'                                    , 'ProductController@index');
        Route::match(['get', 'post'], 'product-manage/{id?}'    , 'ProductController@productManage');
        Route::get('product-delete/{id}'                        , 'ProductController@productDelete');

        Route::get('category'                                   , 'CategoryController@index');
        Route::get('fetch-category/{id?}'                       , 'CategoryController@fetchCategory');
        Route::post('manage-category'                           , 'CategoryController@manageCategory');
        Route::post('update-category'                           , 'CategoryController@updateCategory');
        Route::post('delete-category'                           , 'CategoryController@deleteCategory');

        Route::get('customer'                                   , 'CustomerController@index');
        Route::get('customer-detail/{customer_id}'              , 'CustomerController@customerDetail');
        Route::get('order-detail/{order_id}'                    , 'CustomerController@orderDetail');


        Route::get('logout'                                     , 'AdminController@logout');

    });
});