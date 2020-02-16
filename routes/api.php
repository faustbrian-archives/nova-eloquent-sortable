<?php

use Illuminate\Support\Facades\Route;
use KodeKeep\NovaEloquentSortable\Http\EloquentSortableRequestHandler;

Route::post('{resource}', EloquentSortableRequestHandler::class);
