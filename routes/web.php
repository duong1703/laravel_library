<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Login Routes
Route::controller(LoginController::class)->group(function () {
    Route::get('views/admin/pages/login', 'admin_login')->name('loginadmin');
    Route::post('/auth/login', 'login_process')->name('login_process');
    Route::post('/auth/logout', 'logout_process')->name('logout_process');
});

Route::middleware(['admin'])->group(function () {
    //Admin_home
    Route::controller(HomeController::class)->group(function () {
        Route::get('views/admin/pages/home', 'admin_home')->name('homeadmin');
    });

    //Admin_member
    Route::controller(MemberController::class)->group(function () {
        Route::get('views/admin/pages/member/list', 'member_admin')->name('memberlist');
        Route::get('views/admin/pages/member/add', 'addMember')->name('memberadd');
        Route::get('views/admin/pages/member/edit/{id}', 'memberedit')->name('memberedit');
        Route::put('/member/edit/{id}', 'membereditpost')->name('membereditpost');
        Route::post('/member/add', 'memberpost')->name('memberpost');
        Route::delete('/member/delete/{id}', 'memberdelete')->name('memberdelete');
    });


    //Admin_admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('views/admin/pages/admin/list', 'admin_admin')->name('adminlist');
        Route::get('views/admin/pages/admin/add', 'addAdmin')->name('adminadd');
        Route::get('views/admin/pages/admin/edit/{id}', 'editAdmin')->name('adminedit');
        Route::put('/admin/edit/{id}', 'admineditpost')->name('admineditpost');
        Route::post('/admin/add', 'adminpost')->name('adminpost');
        Route::delete('/admin/delete/{id}', 'admindelete')->name('admindelete');
    });


    //Admin_category
    Route::controller(CategoriesController::class)->group(function () {
        Route::get('views/admin/pages/categories/list', 'categories_admin')->name('categorieslist');
        Route::get('views/admin/pages/categories/add', 'addCategories')->name('categoriesadd');
        Route::get('views/admin/pages/categories/edit/{id}', 'editCategories')->name('categoriesedit');
        Route::put('/subcategories/edit/{id}', 'categorieseditpost')->name('categorieseditpost');
        Route::post('/categories/add', 'categoriespost')->name('categoriespost');
        Route::delete('/admin/categories/{id}', 'categoriesdelete')->name('categoriesdelete');
    });


    //Admin_book
    Route::controller(BookController::class)->group(function () {
        Route::get('/views/admin/pages/book/list', 'book_admin')->name('booklist');
        Route::get('/views/admin/pages/book/add', 'addBook')->name('bookadd');
        Route::get('views/admin/pages/book/edit/{id}', 'editBook')->name('bookedit');
        Route::get('book/{book_file_name}')->name('showbook');
        Route::put('/book/edit/{id}', 'bookeditpost')->name('bookeditpost');
        Route::post('/book/add', 'bookpost')->name('bookpost');
        Route::delete('/book/delete/{id}', 'bookdelete')->name('bookdelete');
    });

});