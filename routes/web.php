<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
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
})->name("home");

Route::get('/dashboard', function () {
  
       
    if(Auth::user()->role=="empolyee"){
        return redirect()->route("requests.index");

    }else{
        return redirect()->route("management.index");
    }


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\ManagementController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TypeController;





Route::group(["middleware"=>["auth","administrator"]],function (){
    
    Route::resource("types",TypeController::class)->except(["show"]);
    Route::get("manage/employees/show",[ManagementController::class,"employees"])->name("management.employees");
    Route::resource("management",ManagementController::class)->parameters(["management"=>"request"])->except(["create","show","store"]);
    Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');
    Route::get('/register/{employee}/edit', [RegisteredUserController::class, 'edit'])
    ->name('register.edit');
    Route::put('/register/{employee}', [RegisteredUserController::class, 'update'])
    ->name('register.update');
    Route::delete('/register/{employee}', [RegisteredUserController::class, 'destroy'])
    ->name('register.destroy');

Route::post('register', [RegisteredUserController::class, 'store']);
    

});
Route::group(["middleware"=>["auth","empolyee"]],function (){
    
    Route::resource("requests",RequestController::class);
});

Route::get("files\download\{attachment}",AttachmentController::class)->middleware(["auth","signed"])->name("attachments.download");