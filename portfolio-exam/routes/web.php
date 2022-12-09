<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PortfolioController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\AboutController as BackendAboutController;
use App\Http\Controllers\Backend\CvController as BackendCvController;
use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\Backend\PortfolioController as BackendPortfolioController;
use App\Http\Controllers\Backend\FooterController as BackendFooterController;

Route::get('/', [HomeController::class, 'index'])->name("frontend.home.index");
Route::get('/portfolio', [PortfolioController::class, 'index'])->name("frontend.portfolio.index");
Route::get('/about', [AboutController::class, 'index'])->name("frontend.about.index");
Route::get('/download/cv', [AboutController::class, 'download_cv'])->name("frontend.about.download.my.cv");
Route::get('/contact', [ContactController::class, 'index'])->name("frontend.contact.index")->middleware('is_admin');
Route::post('/contact/process', [ContactController::class, 'process'])->name("frontend.contact.process");
Route::get('/backend/manage/home', [BackendHomeController::class, 'index'])->name("frontend.manage.home");
Route::get('/backend/manage/portfolio', [BackendPortfolioController::class, 'index'])->name("backend.manage.portfolio");
Route::get('/backend/create/portfolio', [BackendPortfolioController::class, 'create'])->name("backend.create.portfolio");
Route::post('/backend/create/proccess/portfolio', [BackendPortfolioController::class, 'create_process'])->name("backend.create.process.portfolio");
Route::get('/backend/edit/portfolio', [BackendPortfolioController::class, 'edit'])->name("backend.edit.home");
Route::get('/backend/edit/portfolio/{id?}', [BackendPortfolioController::class, 'edit'])->name("backend.edit.home");
Route::post('/backend/edit/process/portfolio', [BackendPortfolioController::class, 'edit_process'])->name("backend.edit.process.home");
Route::get('/backend/manage/about', [BackendAboutController::class, 'index'])->name("backend.manage.about");
Route::post('/backend/manage/about/process', [BackendAboutController::class, 'process'])->name("backend.manage.about.process");

Route::get('/backend/manage/cv', [BackendCvController::class, 'index'])->name("backend.manage.cv");
Route::post('/backend/manage/cv/process', [BackendCvController::class, 'process'])->name("backend.manage.cv.process");

Route::get('/backend/manage/contact', [BackendContactController::class, 'index'])->name("backend.manage.contact")->middleware('is_admin');
Route::get('/backend/manage/footer', [BackendFooterController::class, 'index'])->name("backend.manage.footer");
Route::get('/backend/edit/footer/{$id}', [BackendFooterController::class, 'edit'])->name("backend.edit.footer");
Route::post('/backend/edit/footer/process', [BackendFooterController::class, 'edit_process'])->name("backend.edit.process.footer");

Route::get('/error-access-admin', function(){
    return view('error-access-admin');
})->name("error.admin.access");

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

