<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;


//นักอ่าน
Route::get('/', [BlogController::class, 'index']);
Route::get('/detail/{id}', [BlogController::class, 'detail']);


//นักเขียน
Route::prefix('author')->group(function () {

    Route::get('/blog', [AdminController::class, 'index'])->name('blog');
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/insert', [AdminController::class, 'insert']);
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
});
// Route::controller([AdminController::class])->group(function(){
//     Route::get('index')->name('blog');
// });

// Route::get('blog', [AdminController::class, 'index'])->name('blog');

// Route::get('about', [AdminController::class, 'about'])->name('about');

// Route::get('create', [AdminController::class, 'create']);
// Route::post('insert', [AdminController::class, 'insert']);
// Route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
// Route::get('change/{id}', [AdminController::class, 'change'])->name('change');
// Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
// Route::post('update/{id}', [AdminController::class, 'update'])->name('update');





//เป็นฟังชั่นที่จะแสดงข้อความตามที่เรากำหนดเมื่อเราเข้า Route ไม่ถูกต้อง
// Route::fallback(function () {
//     return ' not found web';
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
