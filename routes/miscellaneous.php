<?php

use Faithgen\Miscellaneous\Http\Controllers\ContactController;
use Faithgen\Miscellaneous\Http\Controllers\FAQController;
use Illuminate\Support\Facades\Route;

Route::prefix('contact-us')
    ->group(function () {
        Route::post('', [ContactController::class, 'contact']);
    });

Route::prefix('faqs')
    ->group(function () {
        Route::get('', [FAQController::class, 'index']);
    });
