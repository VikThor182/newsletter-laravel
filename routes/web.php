<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\NewsletterController::class, 'index']);
