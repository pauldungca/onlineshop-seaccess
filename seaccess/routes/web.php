<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

route::get('/', [homeController:: class, 'index'] );
