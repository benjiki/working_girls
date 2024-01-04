<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\adminController;
use App\Http\Controllers\WorkerController;
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

Route::get('/', [Authcontroller::class, 'view_loginpage'])->name('login'); //new user login.
Route::post('/login_p', [Authcontroller::class, 'loginProcess'])->name('l_p'); //login process.
Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout'); //for logout admins


Route::get('/createacc', [Authcontroller::class, 'view_regpage'])->name('c_new'); //create new user
Route::post('/createacc_req', [Authcontroller::class, 'customer_req'])->name('c_req'); //customer account request



Route::middleware(['web', 'auth'])->group(function () {

    //users
    Route::get('/main_page', [frontendController::class, 'mainpageview'])->name('m_v'); //main page view
    Route::get('/ordermanager/{worker_id}', [frontendController::class, 'orderplacer'])->name('o_m'); //order manager
    Route::get('/orderremove/{order_id}', [frontendController::class, 'deleteOrder'])->name('o_d'); //order delete
    Route::get('/ordercheckout', [frontendController::class, 'updateOrderStatus'])->name('o_checkout'); //order checkedout

    Route::get('/fillterbyage/{num}', [frontendController::class, 'filtterage'])->name('fillternum'); //order checkedout
    Route::get('/fillterbyhight/{m}', [frontendController::class, 'fillterheight'])->name('fillterm'); //order checkedout
    Route::get('/fillterbykg/{kg}', [frontendController::class, 'fillterkg'])->name('fillterkg'); //order checkedout
    Route::get('/fillterbycolor/{col}', [frontendController::class, 'filltercol'])->name('filltercol'); //order checkedout
    Route::post('/fillterbyname', [frontendController::class, 'filltername'])->name('search_name'); //fillter by name

});
Route::group(['middleware' => 'custom'], function () {
    //admin 
    Route::get('/adminmain', [adminController::class, 'mainpageadmin'])->name('indexs'); //admin main page view
    Route::get('/insertadmin', [Authcontroller::class, 'insertadmin'])->name('i_admins'); //insert admins 
    Route::post('/insertadmin_p', [Authcontroller::class, 'insertadminprocess'])->name('insert_admin_p'); //insert admins process
    Route::post('/insertcustomer_p/{id}', [Authcontroller::class, 'updateCustomerProcess'])->name('insert_customer_p'); //insert customer process
    Route::get('/activeeditcustomer/{id}', [adminController::class, 'editcustomer'])->name('edit_c'); //edit customer

    Route::get('/editcustomerpage/{id}', [adminController::class, 'editcustomertablepage'])->name('edit_customer_tablepage'); //edit customer table page
    Route::post('/editcustomertable/{id}', [Authcontroller::class, 'editcustomertable'])->name('edit_customer_table'); //edit customer table

    Route::get('/viewadmin', [adminController::class, 'viewadmin'])->name('v_admins'); //view admins
    Route::get('/editadmin/{id}', [adminController::class, 'editadmin'])->name('edit_a'); //edit admins
    Route::post('/updateadmin_p/{id}', [Authcontroller::class, 'updateadminProcess'])->name('update_admin_p'); //update admin process

    Route::post('/activeadmin/{id}', [adminController::class, 'activeadmin'])->name('active_a'); //avtive admins
    Route::post('/deactiveadmin/{id}', [adminController::class, 'deactiveadmin'])->name('deactive_a'); //deactive admins


    Route::get('/customer_request', [adminController::class, 'viewaccountreq'])->name('vacc_req'); //view account req
    Route::get('/customers_list', [adminController::class, 'viewcustomers'])->name('v_c'); //view customers list

    Route::get('/vieworders', [adminController::class, 'customer_orders'])->name('c_o'); //customers orders
    Route::get('/vieworders_accepted', [adminController::class, 'customer_orders_accepted'])->name('c_o_a'); //customers orders accepted
    Route::get('/vieworders_rejected', [adminController::class, 'customer_orders_rejected'])->name('c_o_r'); //customers orders rejected

    //admin manage workers
    Route::get('/add_worker', [WorkerController::class, 'addWorker'])->name('i_w');
    Route::post('/add_worker_p', [WorkerController::class, 'worker_add_p'])->name('workers_p'); //add this worker processer
    Route::get('/view_workers', [WorkerController::class, 'view_workers'])->name('v_w'); //view workers

    Route::post('/activeaworker/{id}', [WorkerController::class, 'activeworker'])->name('active_w'); //avtive worker
    Route::post('/deactiveworker/{id}', [WorkerController::class, 'deactiveworker'])->name('deactive_w'); //deactive worker

    Route::get('/editworker/{id}', [WorkerController::class, 'editworker'])->name('edit_w'); //edit workers
    Route::post('/updateworker_p/{id}', [WorkerController::class, 'updateworkerProcess'])->name('update_worker_p'); //update worker process

    Route::post('/acceptorder_n/{id}', [adminController::class, 'acceptorders'])->name('accept_order'); //accept orders
    Route::post('/rejectorder/{id}', [adminController::class, 'rejectorders'])->name('reject_order'); //reject orders


});
