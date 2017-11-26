<?php

Route::get('/merchants/create', \Application\Modules\Merchants\Controllers\MerchantController::class . '@create');
Route::get('/merchants', Application\Modules\Merchants\Controllers\MerchantController::class . '@index');
