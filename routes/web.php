<?php

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
use App\Http\Controllers\FormSubmissionController;
use App\Http\Controllers\WebController;

Route::get('/form', [FormSubmissionController::class, 'create']);
Route::post('/form', [FormSubmissionController::class, 'store']);
Route::get('/sa100/{id}', [FormSubmissionController::class, 'formSa']);
Route::get('/bs-graph/{id}', [FormSubmissionController::class, 'showBankGraph']);

Route::get('/download', [WebController::class, 'downloadByPath']);
// Route::get('/', [WebController::class, 'view']);
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/site/index.html');
});