<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ViewController::class,'View_image'])->name("View_image");
Route::get('/Create', [ViewController::class,'View_create'])->name("View_create");
Route::get('/Download_Image', [ImageController::class,'Download_Image'])->name("Download_Image");
Route::get('/Download_Image_zip/{url}', [ImageController::class,'Download_Image_zip'])->name("Download_Image_zip");
Route::get('/Sort/{sort}', [ImageController::class,'Sort'])->name("Sort");

Route::post('/Create_Image', [ImageController::class, 'Create_Image'])->name("Create_Image");

//Json
Route::get('/Get_Image_Info', [ImageController::class, 'Get_Image_Info']);

Route::get('/Get_Image_Info_Id/{id}', [ImageController::class, 'Get_Image_Info_Id']);

