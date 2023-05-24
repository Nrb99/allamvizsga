<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\ServiceController;
use App\Models\Employee;
use App\Models\Reservation;
use App\Models\Salon;

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
Route::middleware(['auth'])->group(function(){
    Route::get('/create', [SalonController::class,'create'] )->name('saloncreate');
    Route::post('/create',[SalonController::class,'store']);
    Route::get('/edit',[SalonController::class,'edit']);
    Route::post('update/',[SalonController::class,'update']);
    Route::get('/addpic',[SalonController::class,'photoform']);
    Route::post('/addphoto',[SalonController::class,'addPhoto']);
    Route::get('/addemployee',[SalonController::class,'employeeForm'])->name('employeeform');
    Route::post('/newemployee',[SalonController::class,'addEmployee'])->name('newemplyee');
    Route::get('/mysalon',[SalonController::class,'mysalon'])->name('mysalon');
    Route::get('/addservice',[SalonController::class,'serviceform']);
    Route::post('/addservice',[SalonController::class,'addService']);
    Route::get('/mypictures',[SalonController::class,'myPictures']);
    Route::delete('/deletepics',[SalonController::class,'deletePhotos']);
    Route::get('/editpfp',[SalonController::class,'editlogo']);
    Route::post('/editlogo',[SalonController::class,'updateLogo']);
    Route::get('/myservices',[SalonController::class,'myServices']);
    Route::delete('/deleteservice',[SalonController::class,'deleteService']);
    Route::get('/editemployee/{id}',[EmployeeController::class,'edit']);
    Route::post('/updateemployee',[EmployeeController::class,'update']);
    Route::delete('/deleteemployee/{id}',[EmployeeController::class,'destroy'])->name('deleteemployee');
    Route::post('/addphoto/{id}',[EmployeeController::class,'addPhotos']);
    Route::get('/myemployees',[EmployeeController::class,'myEmployees'])->name('myemployees');
    Route::get('/employeeservices/{id}',[EmployeeController::class,'employeeServices']);
    Route::get('/addemployeeservice/{id}',[EmployeeController::class,'addServiceForm']);
    Route::post('/addemployeeservice',[EmployeeController::class,'addService']);
    Route::delete('/deleteemployeeservice',[EmployeeController::class,'deleteService']);
    Route::get('/myreservations',[ReservationController::class,'myReservations']);
    Route::get('/employeereservations/{id}',[ReservationController::class,'myEmployeeReservations']);


});
Route::get('/', [SalonController::class,'index'] )->name('show');
Route::get('login', [UserController::class,'login'] )->name('login');
Route::get('/salons/{id}',[SalonController::class,'show'])->name('salon');
Route::get('/registration',[UserController::class,'create'])->name('registration');
Route::post('/registration',[UserController::class,'store']);
Route::post('users/authenticate',  [UserController::class,'authenticate']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('/employee/{id}',[EmployeeController::class,'show'])->name('employee');
Route::get('/reserve/{id}',[ReservationController::class,'create'])->name('reservation');
Route::post('/reserve',[ReservationController::class,'store']);
Route::get('/services',[ServiceController::class,'index']);
