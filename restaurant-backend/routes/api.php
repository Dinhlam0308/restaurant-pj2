<?php
use App\Http\Controllers\CustomerOrderController;

Route::get('/customer-orders', [CustomerOrderController::class, 'apiSearch']);
