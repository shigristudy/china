<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SendgridMail;
use Illuminate\Support\Facades\Mail;

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
Route::get('lang/{locale}', 'VerifyController@lang')->name('lang');
Route::get('/', 'Web\HomeController@index')->name('home');
Route::get('transcription', 'Web\HomeController@transcription')->name('transcription');
Route::get('translation', 'Web\HomeController@translation')->name('translation');
Route::get('voiceover', 'Web\HomeController@voiceover')->name('voiceover');
Route::get('legals', 'Web\HomeController@legals')->name('legals');
Route::get('terms_and_conditions', 'Web\HomeController@terms_and_conditions')->name('terms_and_conditions');
Route::post('/message', 'Auth\MessageController@message')->name('message');
Route::get('register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('register','Auth\RegisterController@register')->name('register');
Route::get('login_view/{id}', 'Auth\LoginController@showLoginForm')->name('login_view');
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('forgot_password','Auth\ForgotPasswordController@showForgotPasswordForm')->name('forgot_password');
Route::post('post_email','Auth\ForgotPasswordController@postEmail')->name('post_email');
Route::get('reset_password_url/{token}','Auth\ResetPasswordController@showFormResetPassword')->name('reset_password_url');
Route::post('reset_password','Auth\ResetPasswordController@updatePassword')->name('reset_password');
Route::post('contact', 'ContactController@send_email')->name('contact');

Route::group(['middleware' => 'auth'], function ($router) {
    $router->get('/profile', 'Web\HomeController@profile')->name('profile');
    $router->get('/profile_update', 'Auth\RegisterController@update')->name('profile_update');
    $router->get('/logout', 'Auth\LoginController@logout')->name('logout');
    $router->post('/trans_file_upload', 'Web\FileController@trans_fileUpload')->name('trans_file_upload');
    $router->post('/audio_file_upload', 'Web\FileController@audio_fileUpload')->name('audio_file_upload');
    $router->post('/voiceover_file_upload', 'Web\FileController@voiceover_fileUpload')->name('voiceover_file_upload');
    $router->get('/project', 'Web\OrdersController@index')->name('project');
    $router->post('/order_view', 'Web\OrdersController@order_view')->name('order_view');
    $router->get('/order', 'Web\OrdersController@order')->name('order');
    $router->get('/get_lang', 'Web\OrdersController@get_lang')->name('get_lang');
    $router->post('/get_audio_price', 'Web\OrdersController@get_audio_price')->name('get_audio_price');
    $router->post('/get_trans_price', 'Web\OrdersController@get_trans_price')->name('get_trans_price');
    $router->post('/audio_order', 'Web\OrdersController@audio_order')->name('audio_order');
    $router->post('/trans_order', 'Web\OrdersController@trans_order')->name('trans_order');
    $router->post('/get_voice_price', 'Web\OrdersController@get_voice_price')->name('get_voice_price');
    $router->post('/voice_order', 'Web\OrdersController@voice_order')->name('voice_order');
});

/*
 Admin Router
 */
Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login','Admin\LoginController@login')->name('admin.login');
Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth.admin'], function ($router) {
    $router->get('/', 'LoginController@showLoginForm')->name('admin.index');
    $router->get('dashboard', 'AdminController@index')->name('admin.home');

    $router->get('change_password', function () {return view('admin.change_password');})->name('admin.change_password');
    $router->post('change_password', 'AdminController@change_password')->name('admin.change_password');

    $router->any('user/index', 'UserController@index')->name('admin.user.index');
    $router->post('user/create', 'UserController@create_user')->name('admin.user.create');
    $router->post('user/edit', 'UserController@edit_user')->name('admin.user.edit');
    $router->get('user/delete/{id}', 'UserController@delete_user')->name('admin.user.delete');
    $router->any('order/index', 'OrderController@index')->name('admin.order.index');
    $router->post('order/view','OrderController@view')->name('admin.order.view');
    $router->post('order/edit','OrderController@update')->name('admin.order.update');
    $router->get('order/delete/{order_number}', 'OrderController@delete')->name('admin.order.delete');
    $router->post('order/message', 'OrderController@message')->name('admin.order.message');
    $router->get('price/index', 'ServicePriceController@index')->name('admin.price.index');
    $router->post('price/update', 'ServicePriceController@update')->name('admin.price.update');
    $router->get('service_lang/index', 'ServiceLangController@index')->name('admin.service_lang.index');
    $router->get('service_lang/edit/{lang_id}', 'ServiceLangController@show_edit')->name('admin.service_lang.edit');
    $router->post('service_lang/voice_sample_upload', 'ServiceLangController@upload_file')->name('admin.service_lang.upload_sample_file');
    $router->post('service_lang/{lang_id}', 'ServiceLangController@update_status')->name('admin.service_lang.status_flag');
    $router->get('service_lang/delete/{file_id}', 'ServiceLangController@delete_file')->name('admin.service_lang.delete_voicesample_file');
    $router->post('service_lang/update', 'ServiceLangController@update')->name('admin.service_lang.update');

});

/*
 *
 * Super Admin Router
 */

Route::get('superadmin/login', 'SuperAdmin\LoginController@showLoginForm')->name('superadmin.login');
Route::post('superadmin/login','SuperAdmin\LoginController@login')->name('superadmin.login');
Route::get('superadmin/logout', 'SuperAdmin\LoginController@logout')->name('superadmin.logout');

Route::group(['prefix' => 'superadmin', 'namespace' => 'SuperAdmin', 'middleware' => 'auth.superadmin'], function ($router) {
    $router->get('/', 'LoginController@showLoginForm')->name('superadmin.index');
    $router->get('dashboard', 'SuperadminController@index')->name('superadmin.home');

    $router->get('change_password', 'SuperadminController@change_password')->name('superadmin.change_password');
    $router->post('change_password', 'SuperadminController@change_password')->name('superadmin.change_password');


    $router->get('user/admin/','UserController@admin_index')->name('superadmin.user.admin_index');
    $router->get('user/admin/index', 'UserController@admin_index')->name('superadmin.user.admin_index');
    $router->post('user/admin/create', 'UserController@admin_create')->name('superadmin.user.admin_create');
    $router->post('user/admin/edit', 'UserController@admin_edit')->name('superadmin.user.admin_edit');
    $router->get('user/admin/delete/{id}', 'UserController@admin_delete')->name('superadmin.user.admin_delete');
    $router->get('user/customer/index', 'UserController@customer_index')->name('superadmin.user.customer_index');
    $router->post('user/customer/create', 'UserController@customer_create')->name('superadmin.user.customer_create');
    $router->post('user/customer/edit', 'UserController@customer_edit')->name('superadmin.user.customer_edit');
    $router->get('user/customer/delete/{id}', 'UserController@customer_delete')->name('superadmin.user.customer_delete');
    $router->get('user/role', 'UserController@role_index')->name('superadmin.user.role_index');
    $router->post('user/role/create', 'UserController@role_create')->name('superadmin.user.role_create');
    $router->post('user/role/edit', 'UserController@role_edit')->name('superadmin.user.role_edit');
    $router->get('user/role/delete/{id}', 'UserController@role_delete')->name('superadmin.user.role_delete');
    $router->any('order/index', 'OrderController@index')->name('superadmin.order.index');
    $router->post('order/update', 'OrderController@edit')->name('superadmin.order.update');
    $router->get('order/delete', 'OrderController@delete')->name('superadmin.order.delete');

    $router->get('price/index', 'ServicePriceController@index')->name('superadmin.price.index');
    $router->post('price/update', 'ServicePriceController@update')->name('superadmin.price.update');

    $router->get('service_lang/index', 'ServiceLangController@index')->name('superadmin.service_lang.index');
    $router->get('service_lang/edit/{lang_id}', 'ServiceLangController@show_edit')->name('superadmin.service_lang.edit');
    $router->post('service_lang/voice_sample_upload', 'ServiceLangController@upload_file')->name('superadmin.service_lang.upload_sample_file');
    $router->post('service_lang/{lang_id}', 'ServiceLangController@update_status')->name('superadmin.service_lang.status_flag');
    $router->get('service_lang/delete/{file_id}', 'ServiceLangController@delete_file')->name('superadmin.service_lang.delete_voicesample_file');
    $router->post('service_lang/update', 'ServiceLangController@update')->name('superadmin.service_lang.update');
});

