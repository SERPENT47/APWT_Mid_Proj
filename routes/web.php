<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\doctorController;

Route::get('/',[doctorController::class,'home'])->name('home');
Route::get('/doctor/list',[doctorController::class,'list'])->name('doctor.list');
Route::get('/patient/list',[doctorController::class,'pList'])->name('patient.list');
Route::get('/doctor/create',[doctorController::class,'create'])->name('doctor.create');
Route::post('/doctor/create',[doctorController::class,'createSubmit'])->name('doctor.create.submit');
Route::get('/doctor/edit',[doctorController::class,'edit'])->name('doctor.edit');
Route::post('doctor/edit',[doctorController::class,'editSubmit'])->name('doctor.edit.submit');
Route::get('pescriptioin/make/{id}',[doctorController::class,'makePescription'])->name('make.pescription');
Route::post('pescriptioin/make/{id}',[doctorController::class,'makePescriptionSubmit'])->name('make.pescription.submit');
Route::get('pescriptioin/view/{id}',[doctorController::class,'viewPescription'])->name('pescription.view');
Route::get('pescriptioin/edit/{id}',[doctorController::class,'editPescription'])->name('edit.pescription');
Route::post('pescriptioin/edit/{id}',[doctorController::class,'editPescriptionSubmit'])->name('edit.pescription.submit');

Route::get('doctor/login',[doctorController::class,'login'])->name('doctor.login');
Route::post('doctor/login',[doctorController::class,'loginSubmit'])->name('doctor.login.submit');
Route::get('doctor/dashboard',[doctorController::class,'dashboard'])->name('doctor.dash')->middleware('logged.doctor');
Route::get('/logout',function(){
    session()->forget('logged');
    session()->flash('msg','Sucessfully Logged out');
    return redirect()->route('doctor.login');
})->name('logout');
Route::get('/mail',[doctorController::class,'mail']);