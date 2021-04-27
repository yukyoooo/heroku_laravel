<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CommentsController;
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

Route::get('/', [SlideController::class, 'index'])->name('bookapp.slide.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/create', [SlideController::class, 'create'])->name('bookapp.slide.create');
    Route::post('/store', [SlideController::class, 'store'])->name('bookapp.slide.store');
    Route::get('/show/{id}', [SlideController::class, 'show'])->name('bookapp.slide.show');
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

Route::middleware(['auth'])->prefix('contact')->group(function () {
    Route::get('/index', [ContactFormController::class, 'index'])->name('contact.index');
    Route::get('/create', [ContactFormController::class, 'create'])->name('contact.create');
    Route::post('/store', [ContactFormController::class, 'store'])->name('contact.store');
    Route::get('/show/{id}', [ContactFormController::class, 'show'])->name('contact.show');
    Route::get('/edit/{id}', [ContactFormController::class, 'edit'])->name('contact.edit');
    Route::post('/update/{id}', [ContactFormController::class, 'update'])->name('contact.update');
    Route::post('/destroy/{id}', [ContactFormController::class, 'destroy'])->name('contact.destroy');
});


Auth::routes();

Route::get('/home', [SlideController::class, 'index'])->name('bookapp.slide.index');

Route::get('/{any}', function(){
    return view('app');
})->where('any', '.*'); //補足：.*は、正規表現で0文字以上の任意の文字列を意味する
