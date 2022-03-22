<?php

use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\ErrorHandler\Debug;


use function Psy\debug;

Route::get('/', function () {

    // \Debugbar::info("Sve je ok!");
    return view('welcome');
});

Route::resource("/phones",PhoneController::class);