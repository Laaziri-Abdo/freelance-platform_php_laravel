<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;

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

Route::post('/contact',[ContactController::class, 'contact']);
Route::post('/freelancer/save',[FreelancerController::class, 'save'])->name('freelancer.save');
Route::post('/freelancer/check',[FreelancerController::class, 'check'])->name('freelancer.check');
Route::get('/freelancer/logout',[FreelancerController::class, 'logout'])->name('freelancer.logout');

Route::post('/client/save',[ClientController::class, 'save'])->name('client.save');
Route::post('/client/check',[ClientController::class, 'check'])->name('client.check');
Route::get('/client/logout',[ClientController::class, 'logout'])->name('client.logout');



Route::group(['middleware'=>['AuthCheck']], function(){
    // freelancer------------------
    Route::get('/freelancer/login',[FreelancerController::class, 'login'])->name('freelancer.login');
    Route::get('/freelancer/register',[FreelancerController::class, 'register'])->name('freelancer.register');

    Route::get('/freelancer/dashboard',[FreelancerController::class, 'dashboard']);
    Route::get('/freelancer/settings',[FreelancerController::class,'settings']);
    Route::get('/freelancer/profile',[FreelancerController::class,'profile']);
    Route::get('/freelancer/deleteCompetance/{id}',[FreelancerController::class,'deleteCompetance']);
    Route::get('/freelancer/createCompetance/',[FreelancerController::class,'createCompetance']);
    Route::get('/freelancer/staff',[FreelancerController::class,'staff']);
    Route::post('/freelancer/update/{id}',[FreelancerController::class, 'update']);

    Route::post('/postuler',  [App\Http\Controllers\PostulerController::class, 'postuler'] );
    Route::get('/client/showPostuler',  [App\Http\Controllers\PostulerController::class, 'show'] );
    Route::get('/deletePostuler/{id}',  [App\Http\Controllers\PostulerController::class, 'deletePostuler'] );
    Route::get('/acceptPostuler/{id}/{freelancer_id}',  [App\Http\Controllers\PostulerController::class, 'acceptPostuler'] );

    // client--------------
    Route::get('/client/login',[ClientController::class, 'login'])->name('client.login');
    Route::get('/client/register',[ClientController::class, 'register'])->name('client.register');

    Route::get('/client/dashboard',[ClientController::class, 'dashboard']);
    Route::get('/client/category',[ClientController::class,'category']);
    Route::get('/client/profile',[ClientController::class,'profile']);
    Route::get('/client/project',[ClientController::class,'project']);
    Route::post('/client/update/{id}',[ClientController::class, 'update']);
    Route::post('/client/addProject',[ClientController::class, 'addProject']);
    Route::get('/client/deleteProject/{id}',[ClientController::class, 'deleteProject']);
    Route::get('/client/projectD/{id}',[ClientController::class, 'findProject']);
    Route::post('/client/editProject/{id}',[ClientController::class, 'editProject']);
    Route::get('/client/choose/{id}',[ClientController::class, 'choose']);
    Route::post('/client/factures',[ClientController::class, 'facture']);

});
