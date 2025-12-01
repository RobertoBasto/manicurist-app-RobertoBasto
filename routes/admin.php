<?php
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');

//gestion de roles
Route::resource('roles',RoleController::class);
Route::resource('users',UsuarioController::class);
Route::resource('products', ProductController::class);

/////////////////////////////////////////////////
?>