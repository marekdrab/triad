<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('index');
});
Route::post('/upload-cv', [UploadController::class, 'uploadCv']);
