<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StaffDepartment;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', [HomeController::class, 'index']);

//Login

Route::get('/', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'check_login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

//Dashboard

Route::get('/admin',[DashboardController::class, 'index']);

//Room type
Route::resource('admin/roomtype', RoomTypeController::class);

Route::get('admin/roomtype/{id}/delete', [RoomTypeController::class, 'destroy']);

//Room
Route::resource('admin/room', RoomController::class);

Route::get('admin/room/{id}/delete', [RoomController::class, 'destroy']);

//Customer
Route::resource('admin/customer', CustomerController::class);

Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);

Route::get('admin/roomtypeimage/delete/{id}', [RoomTypeController::class, 'delete_image']);

//Department

Route::resource('admin/department', StaffDepartment::class);
Route::get('admin/department/{id}/delete', [StaffDepartment::class, 'destroy']);

//Staff

Route::resource('admin/staff', StaffController::class);
Route::get('admin/staff/{id}/delete', [StaffController::class, 'destroy']);
Route::get('admin/staff/payment/{id}/add', [StaffController::class, 'add_payment']);
Route::post('admin/staff/payment/{id}', [StaffController::class, 'save_payment']);

Route::get('admin/staff/payment/{id}', [StaffController::class, 'all_payment']);
Route::get('admin/staff/payment/{id}/delete', [StaffController::class, 'delete_payment']);

//Bookings
Route::resource('admin/booking', BookingController::class);
Route::get('admin/booking/{id}/delete', [BookingController::class, 'destroy']);
Route::get('admin/booking/available/{id}', [BookingController::class, 'available_room']);






