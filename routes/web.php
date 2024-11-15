<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\Auth2faController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\InfoController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\SupportController;
use App\Http\Controllers\admin\VisitorsController;
use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\client\BookDetailController;
use App\Http\Controllers\client\CommentController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\IntroController;
use App\Mail\AuthenMemberMail;
use App\Models\admin\admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/** USER_WEBSITE */

//User_home
Route::controller(\App\Http\Controllers\client\HomeController::class)->group(function () {
    Route::get('/', 'user_home')->name('user_home');
});

//User_login
Route::controller(\App\Http\Controllers\client\LoginController::class)->group(function () {
    Route::get('views/client/pages/login', 'user_login')->name('user_login');
    Route::post('/auth/userLoginpost', 'userLoginpost')->name('userLoginpost');
    Route::post('/auth/userLogoutpost', 'userLogoutpost')->name('userLogoutpost');
});


//User_book
Route::controller(\App\Http\Controllers\client\BookController::class)->group(function () {
    Route::get('views/client/pages/book', 'user_book')->name('user_book');
    Route::get('search', 'searchBook')->name('search');
    Route::get('/getbook/{id}', 'getIDbook')->name('getIDbook');
    Route::get('/get-book-count', 'getReadCountForBook')->name('getReadCountForBook');
    Route::post('/book/read-count/{id}', 'readBook')->name('user_book_id');
    Route::post('/save-book-read', 'saveBookRead')->name('save.book.read');

});

//User_contact
Route::controller(ContactController::class)->group(function () {
    Route::get('views/client/pages/contact', 'user_contact')->name('user_contact');
    Route::post('/contact/postcontact', 'postcontact')->name('postcontact');
});


//User_bookdetail
Route::controller(BookDetailController::class)->group(function () {
    Route::get('book/{book_file_name}')->name('showbook');
    Route::get('views/client/pages/bookdetail', 'user_bookdetail')->name('user_bookdetail');
    Route::get('views/client/pages/bookdetail/{id}', 'user_bookdetail')->name('user_bookdetail_id');
    Route::get('views/client/pages/bookdetail/{book_id}', 'user_bookdetail')->name('user_bookdetail_ids');
});


//User_Intro
Route::controller(IntroController::class)->group(function () {
    Route::get('views/client/pages/intro/info', 'info_user')->name('info_user');
    Route::get('views/client/pages/intro/structure', 'structure_user')->name('structure_user');
});

//user_account
Route::controller(AccountController::class)->group(function () {
    Route::get('views/client/pages/account', 'user_account')->name('user_account');
    Route::get('/account', 'show_user_account')->name('show_user_account');
});

//User_comment
Route::controller(CommentController::class)->group(function () {
    Route::get('/user_comment', 'usercomment')->name('usercomment');
    Route::get('/book/{id}', 'getBookDetail')->name('bookdetail');
    Route::post('/comment/{id}', 'user_comment_post')->name('user_comment');
});



Route::middleware(['blockip'])->group(function () {
    Route::middleware('auth:admin')->group(function () {
        Route::group(['middleware' => 'nocache'], function () {
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
            Route::middleware('can:manage-everything')->group(function () {
                Route::controller(AdminController::class)->group(function () {
                    Route::get('views/admin/pages/admin/list', 'admin_admin')->name('adminlist');
                    Route::get('views/admin/pages/admin/add', 'addAdmin')->name('adminadd');
                    Route::get('views/admin/pages/admin/edit/{id}', 'editAdmin')->name('adminedit');
                    Route::put('/admin/edit/{id}', 'admineditpost')->name('admineditpost');
                    Route::post('/admin/add', 'adminpost')->name('adminpost');
                    Route::delete('/admin/delete/{id}', 'admindelete')->name('admindelete');
                });
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

            //Admin_visitors
            Route::controller(VisitorsController::class)->group(function () {
                Route::get('/views/admin/pages/visitors/list', 'visitors_admin')->name('visitorslist');
                Route::post('/update-read-count', 'updateReadCount')->name('updatereadcount');
                Route::get('/showReadingChart', 'showReadingChart')->name('showReadingChart');
            });

            //Admin_support
            Route::controller(SupportController::class)->group(function () {
                Route::get('/views/admin/pages/support/list', 'message_admin')->name('message_admin');
                Route::get('/views/admin/pages/support/edit/{id}', 'editMessage')->name('editMessage');
                Route::put('/admin/support/{id}', 'replyMessage')->name('replyMessage');
                Route::delete('/message/delete/{id}', 'messagedelete')->name('messagedelete');
            });

            //Admin_info
            Route::controller(InfoController::class)->group(function () {
                Route::get('/views/admin/pages/info/infoversion', 'Infoversion')->name('Infoversion');
            });

            //2FA 
            Route::controller(Auth2faController::class)->group(function () {
                Route::get('/views/admin/pages/auth2fa','index')->name('auth2fa');
            });
        });

    });
});