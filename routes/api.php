<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\Corporate\ContactsController;
use App\Http\Controllers\API\Auth\ForgotPasswordController;
use App\Http\Controllers\API\Corporate\CompaniesController;
use App\Http\Controllers\API\Corporate\ContractsController;
use App\Http\Controllers\API\Corporate\CorporateController;
use App\Http\Controllers\API\Corporate\DocumentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('forgot-password',[ForgotPasswordController::class,'forgot']);
Route::post('/reset-password/{token}',[ForgotPasswordController::class,'reset']);
Route::apiResource('user',UserController::class);
Route::apiResource('corporate',CorporateController::class);
Route::get('corporatedetail/{corporate}',[CorporateController::class,'corporateDetail']);
Route::apiResource('document',DocumentsController::class);
Route::get('documentdetail/{document}',[DocumentsController::class,'documentDetail']);
Route::apiResource('contract',ContractsController::class);
Route::apiResource('contact',ContactsController::class);
Route::apiResource('companie',CompaniesController::class);


