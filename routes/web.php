<?php


    Auth::routes(['verify'=> true]);

    Route::get('/', 'LandingController@index')->name('home');
    Route::get('/contact', 'LandingController@getContact')->name('home.contact');
    Route::post('/contact/post', 'LandingController@postContact')->name('home.contact.post');
    Route::get('/about', 'LandingController@getAbout')->name('home.about');
    Route::get('/how-it-works', 'LandingController@getHowitworks')->name('home.howitworks');
    Route::post('/reset/password', 'Auth\ForgotPasswordController@postForgotten')->name('pass.reset');
    Route::get('/forgot/password', 'Auth\ForgotPasswordController@index')->name('pass.forgot');
    Route::get('/faq', 'LandingController@getFaq')->name('home.faq');
    Route::get('/privacy-policy', 'LandingController@getPrivacy')->name('home.privacy');
    Route::get('/delivery-information', 'LandingController@getDelivery')->name('home.delivery');
    Route::get('/terms-and-conditions', 'LandingController@getTerms')->name('home.terms');


    Route::get('/login/admin', 'Auth\LoginAdminController@showAdminLoginForm')->name('get.login');
    Route::post('post/login/admin', 'Auth\LoginAdminController@adminLogin')->name('admin.login');
    Route::get('/logout/admin', 'Auth\LoginAdminController@adminLogout')->name('admin.logout');
    Route::get('/admin/forgotten', 'Auth\AdminForgotController@index')->name('admin.forgot');
    Route::post('/admin/forgot/post', 'Auth\AdminForgotController@postForgotten')->name('admin.forgot.post');
    Route::get('/admin/reset/password/{token}', 'Auth\ResetAdminController@showResetForm')->name('admin.reset.password');
    Route::post('/admin/reset', 'Auth\ResetAdminController@reset')->name('admin.reset.post');


    Route::group(['prefix'=>'product'], function (){
        Route::get('/list/{catid?}', 'Customer\ProductController@index')->name('product.list');
        Route::get('/details/{productid}', 'Customer\ProductController@show')->name('product.details');
        Route::get('/search', 'Customer\ProductController@productsearch')->name('productsearch');
        Route::get('/add-to-cart/{productid}','Customer\ProductController@getAddtocart')->name('product.addtocart');
        Route::get('/view-cart','Customer\ProductController@getCartlist')->name('product.viewcart');
        Route::get('/remove/{productid}/cart','Customer\ProductController@removeCart')->name('product.remove.cart');
        Route::get('/update/{productid}/cart','Customer\ProductController@updateCart')->name('product.update.cart');
        Route::get('/update/cart','Customer\ProductController@discount')->name('product.discount.cart');
        Route::get('/remove/discount','Customer\ProductController@discountOut')->name('product.discount.out');

    });

    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

    Route::get('/home','Customer\CustomerController@index')->name('home');
    Route::get('/checkout/{orderid?}','Customer\CustomerController@checkout')->name('cart.check.out');
    Route::get('/profile/detail','Customer\CustomerController@edit')->name('customer.detail');
    Route::post('/detail/update','Customer\CustomerController@update')->name('customer.edit');
    Route::post('/billing/address','Customer\CustomerController@updatebilling')->name('billing.edit');
    Route::get('/change/password', 'Customer\CustomerController@getChangePwd')->name('customer.password');
    Route::post('/change/password/user', 'Customer\CustomerController@postChangePwd')->name('customer.password.post');
    Route::get('/orders','Customer\OrderController@getOrders')->name('customer.order');
    Route::get('/orders/list/{id}','Customer\OrderController@getOrderDetails')->name('customer.order.list');

    Route::get('/wishlist/{productid}', 'Customer\WishlistController@getAddWishlist')->name('wishlist.add');
    Route::get('/customer/wish', 'Customer\WishlistController@getindex')->name('wishlist.view');
    Route::post('/customer/wish/{id}/delete', 'Customer\WishlistController@destroy')->name('wishlist.remove');

    Route::get('/paystat','PaymentController@getpaymentstatus');
    Route::post('/paystatus','PaymentController@postpaymentstatus');
    Route::get('/customer/payment','PaymentController@getCustomerPayment')->name('customer.payment');


    Route::group(["prefix"=>"app/admin"], function (){
        //Route::get('/login','LandingController@getAdminLogin')->name('admin.login');
        //Route::get('/register','Admin\AdminController@getLogin')->name('admin.register');
        Route::post('/create', 'Auth\RegisterAdminController@postCreateAdmin')->name('admin.create');
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        Route::get('/password/change','Admin\AdminController@getChangePassword')->name('password.change');
        Route::get('/admin/delete/{id}','Admin\AdminController@deleteAdmin')->name('admin.delete');
        Route::post('/password/edit','Admin\AdminController@postChangePassword')->name('post.password.change');
        Route::get('/user/list','Admin\AdminController@index')->name('admin.list');
        Route::get('/profile/info','Admin\AdminController@showProfile')->name('admin.profile');
        Route::post('/profile/update','Admin\AdminController@update')->name('admin.update');
        Route::get('/user/disable/{id}','Admin\AdminController@destroy')->name('admin.disable');
        Route::get('/payments/trans','Admin\PaymentController@getTransactions')->name('admin.payment.trans');

        //customer routes
        Route::group(['prefix'=>'customer'], function (){

            Route::get('/list','Admin\CustomerController@index')->name('admin.customer.list');
            Route::get('/list/pdf','Admin\CustomerController@exportPdf')->name('admin.customer.export');
            Route::get('/orders/{orderid}','Admin\CustomerController@show')->name('admin.customer.order');
            Route::get('/disable/{orderid}','Admin\CustomerController@destroy')->name('admin.customer.disable');
            Route::get('/enable/{orderid}','Admin\CustomerController@enable')->name('admin.customer.enable');

        });

        Route::group(['prefix'=>'product'], function (){
            Route::get('/discount','Admin\ProductController@getDiscount')->name('create.product.discount');
            Route::post('/discount','Admin\ProductController@postDiscount')->name('post.product.discount');
            Route::get('/discount/{id}','Admin\ProductController@disableDiscount')->name('update.discount.status');
            Route::get('/create','Admin\ProductController@create')->name('create.product');
            Route::post('/create','Admin\ProductController@store')->name('post.product');
            Route::get('/list','Admin\ProductController@index')->name('list.product');
            Route::get('/{id}/edit','Admin\ProductController@edit')->name('edit.product');
            Route::post('/{id}/edit/post','Admin\ProductController@update')->name('edit.product.post');
            Route::get('/{id}/disable','Admin\ProductController@destroy')->name('disable.product');
            Route::get('/{id}/category/disable','Admin\ProductcategoryController@destroy')->name('disable.category');
        });

        Route::group(['prefix'=>'orders'], function (){

            Route::get('/list', 'Admin\OrderController@index')->name('list.orders');
            Route::get('/details/{id}/{order?}', 'Admin\OrderController@details')->name('list.orders.details');
            Route::get('/update/processing', 'Admin\OrderController@updateProcessed')->name('list.orders.update');
            Route::get('/update/delivered', 'Admin\OrderController@updateDelivered')->name('list.orders.update.delivered');
            Route::get('/update/pending', 'Admin\OrderController@updatePending')->name('list.orders.update.pending');
            Route::get('/recent', 'Admin\OrderController@Recentorders')->name('list.orders.recent');
            Route::get('/delivered', 'Admin\OrderController@Deliveredorders')->name('list.orders.delivered');
            Route::get('/processing', 'Admin\OrderController@Processorders')->name('list.orders.processing');
            Route::get('/ready', 'Admin\OrderController@Readytodeliver')->name('list.orders.ready');
            Route::get('/delivery/{orderid}/note', 'Admin\OrderController@Deliverynote')->name('list.orders.delivery.note');
            Route::get('/delivery/{orderid}/note/pdf', 'Admin\OrderController@Deliverynotepdf')->name('list.orders.delivery.note.pdf');
            Route::get('/procure/list', 'Admin\OrderController@Procure')->name('procure.list');
            Route::get('/procure/list/pdf/{start}/{end}', 'Admin\OrderController@Procurepdf')->name('procure.list.pdf');

        });
        //Product routes


        //Product Category routes
        Route::get('/category/list','Admin\ProductcategoryController@index')->name('list.category');
        Route::post('/category/create','Admin\ProductcategoryController@store')->name('post.category');

});
