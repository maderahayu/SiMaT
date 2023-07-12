<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
 
Auth::routes();
   
//Anak Magang Routes List
Route::middleware(['auth', 'user-access:pemagang'])->group(function () {
    Route::get('/magang/home', [HomeController::class, 'index'])->name('home');
});
   
//Supervisor Route List
Route::middleware(['auth', 'user-access:supervisor'])->group(function () {
   
    Route::get('/supervisor/home', [HomeController::class, 'supervisorHome'])->name('supervisor.home');
});


?>