<?php

use Faithgen\Miscellaneous\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('contact-us')
    ->group(function () {
        Route::post('', [ContactController::class, 'contact']);
    });
