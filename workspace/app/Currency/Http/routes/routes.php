<?php

Route::get('/currency', \Currency\Http\Controllers\CurrencyController::class . '@index');