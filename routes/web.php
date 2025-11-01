<?php

use App\Http\Controllers\Role\Admin\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Role\Admin\AdminController;
use App\Http\Controllers\Role\Admin\ReportController;
use App\Http\Controllers\Role\Admin\TransactionController;
use App\Http\Controllers\Role\Manager\ManagerController;
use App\Http\Controllers\Role\Manager\ReportController as ManagerReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('manager.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('transaction', TransactionController::class);
    Route::resource('category', CategoryController::class);
    Route::get('report', [ReportController::class, 'index'])->name('report');
    Route::post('generate-report')->name('generate.report');
})->middleware(['auth', 'role.check:Admin']);

// Route::get('send-mail', [MailController::class, 'index']);

Route::prefix('manager')->name('manager.')->group(function () {
    Route::get('dashboard', [ManagerController::class, 'index'])->name('dashboard');
    Route::get('report', [ManagerReportController::class, 'index'])->name('report');
    Route::get('generate-report')->name('generate.report');
})->middleware(['auth', 'role.check:Manager']);

Route::get(
    'report',
    function () {
        // return view('role.manager.report.report_doc');
        return view('role.admin.report.report_doc');
    }
);

require __DIR__ . '/auth.php';
