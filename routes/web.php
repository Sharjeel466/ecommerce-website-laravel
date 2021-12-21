<?php
use Illuminate\Support\Facades\Route;

// Route::get('home'                                               , 'HomeController@index');
Auth::routes();

Route::namespace('Front')->group(function(){

    Route::get('/'                                                  , 'FrontController@index');
    Route::get('product-details/{category_name}/{product_id}'                       , 'FrontController@productDetails');

    Route::middleware('cart')->group( function(){

        Route::get('cart'                                               , 'CartController@cartDetails');
        Route::post('add-to-cart/{product_id}'                          , 'CartController@addToCart');
        Route::post('update-cart/{product_id}'                          , 'CartController@updateCart');
        Route::post('cart-remove'                                       , 'CartController@cartRemove');
        Route::match(['get', 'post'],'checkout/'                        , 'CartController@checkout')->name('checkout');
        Route::get('thankyou'                                           , 'CartController@thankyou');
        
    });

    Route::get('product_list/{category_name?}/{category_id?}'                        , 'FrontController@productList');

    Route::view('blog', 'front.blog');
    Route::view('contact', 'front.contact');

    Route::get('product_search'                                     , 'FrontController@productSearch');

});

Route::prefix('admin')->group(function(){

    Route::namespace('Admin')->group(function(){

        Route::get('/'                                              , 'AdminController@index');

        Route::middleware('admin')->group( function(){

            Route::get('dashboard'                                  , 'AdminController@dashboard');

            Route::get('category'                                   , 'CategoryController@index');
            Route::get('fetch-category/{id?}'                       , 'CategoryController@fetchCategory');
            Route::post('manage-category'                           , 'CategoryController@manageCategory');
            Route::post('update-category'                           , 'CategoryController@updateCategory');
            // Route::post('delete-category'                           , 'CategoryController@deleteCategory');

            Route::get('product'                                    , 'ProductController@index');
            Route::get('product-create'                             , 'ProductController@create');
            Route::post('product-store'                             , 'ProductController@store');
            Route::get('product-edit/{product_id}'                  , 'ProductController@edit');
            Route::post('product-update'                            , 'ProductController@update');
            Route::get('product-delete/{id}'                        , 'ProductController@delete');

            Route::get('user'                                       , 'UserController@index');
            Route::get('user-detail/{user_id}'                      , 'UserController@userDetail');
            Route::get('order-detail/{order_id}'                    , 'UserController@orderDetail');

        });
    });
});