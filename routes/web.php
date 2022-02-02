<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// BookApp
Route::get('/', [SlideController::class, 'index'])->name('bookapp.slide.index');
Route::get('/show/{id}', [SlideController::class, 'show'])->name('bookapp.slide.show');
Route::get('/booklist', [SlideController::class, 'index_booklist'])->name('bookapp.slide.booklist');
Route::get('/todolist', [SlideController::class, 'todolist'])->name('bookapp.slide.todolist');
Route::middleware(['auth'])->group(function () {
    Route::get('/selectBook', [SlideController::class, 'selectBook'])->name('bookapp.slide.selectBook');
    Route::get('/create', [SlideController::class, 'create'])->name('bookapp.slide.create');
    Route::post('/store', [SlideController::class, 'store'])->name('bookapp.slide.store');
    Route::get('/edit/{id}', [SlideController::class, 'edit'])->name('bookapp.slide.edit');
    Route::post('/update/{id}', [SlideController::class, 'update'])->name('bookapp.slide.update');
    Route::post('/destroy/{id}', [SlideController::class, 'destroy'])->name('bookapp.slide.destroy');
});

Route::post('comment', [CommentsController::class, 'store'])->name('comment.store');
Route::get('members', [UserController::class, 'members'])->name('bookapp.user.user');
Route::get('members/{id}', [UserController::class, 'show'])->name('bookapp.user.show');
Route::middleware(['auth'])->prefix('mypage')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('bookapp.user.index');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('bookapp.user.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('bookapp.user.update');
});

//いいね機能
Route::post('/like', [LikeController::class, 'like'])->name('like.like');

Auth::routes();

Route::get('/{any}', function(){
    return view('app');
})->where('any', '.*'); //補足：.*は、正規表現で0文字以上の任意の文字列を意味する
