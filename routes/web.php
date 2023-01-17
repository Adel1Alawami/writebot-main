<?php
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleGenerator;
use App\Http\Controllers\ImageGenerator;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::post('pay', [PaymentController::class , 'pay'])->name('payment');

// Route::get('/draw', function () {
//     $title = '';
//     $content = '';
//     return view('draw', compact('title', 'content'));
// });

// Route::post('/write/generate', [ArticleGenerator::class, 'index']);
// Route::post('/draw/generate', [ImageGenerator::class, 'index']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'middleware' => 'is_subed',
       
    ], function (){
       
        
        Route::get('/draw', function () {
            $title = '';
            $content = '';
            return view('draw', compact('title', 'content'));
        });
        Route::get('/write', function () {
            $title = '';
            $content = '';
            return view('write', compact('title', 'content'));
        });
        Route::post('/write/generate', [ArticleGenerator::class, 'index']);
        Route::post('/draw/generate', [ImageGenerator::class, 'index']);
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');
     
        
    });
    });







require __DIR__.'/auth.php';
