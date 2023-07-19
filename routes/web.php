<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemagangController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\TugasController;
use App\Models\Pemagang;
use App\Models\Supervisor;

Route::get('/', function () {
    return view('welcome');
});
 
Auth::routes();
   
//Anak Magang Routes List
Route::middleware(['auth', 'user-access:pemagang'])->group(function () {
    Route::get('/magang/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/magang/home', [PemagangController::class, 'daftarAnakMagang'])->name('magang.daftarList');
});

//Supervisor Route List
Route::middleware(['auth', 'user-access:supervisor'])->group(function () {
    
    Route::get('/supervisor/home', [HomeController::class, 'supervisorHome'])->name('supervisor.home');
    Route::get('/supervisor/daftarAnakMagang', [SupervisorController::class, 'daftarAnakMagang'])->name('sup.daftarList');
    Route::get('/supervisor/daftarAnakMagang/edit/{id}', [SupervisorController::class, 'editAnakMagang'])->name('sup.editPemagang');
    // Route::get('/supervisor/daftarAnakMagang/delete/{id}', [SupervisorController::class, 'delete'])->name('sup.deletePemagang');
});


?>