<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


    Route::get('/', [MainController::class, 'showHome'])->name('home');
    Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
    Route::middleware(['web', 'guest'])->group(function () {
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login_process', [AuthController::class, 'loginProcess'])->name('login_process');
        Route::post('/register_process', [AuthController::class, 'registerProcess'])->name('register_process');
    });
    Route::middleware(['web', 'auth'])->group(function () {
        // Группа путей обычного пользователя
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/createApplication', [MainController::class, 'showCreateApplication'])->name('showCreateApplication');
        Route::post('/createApplication_process', [MainController::class, 'createApplication'])->name('createApplication');
        Route::get('/applications', [MainController::class, 'applications'])->name('applications');
        Route::get('/profile/{id}', [MainController::class, 'profile'])->name('profile');

        Route::post('/profile/update-avatar/{id}', [MainController::class, 'updateAvatar'])->name('updateAvatar');
        Route::delete('/profile/delete-avatar', [MainController::class, 'deleteAvatar'])->name('deleteAvatar');
        Route::post('/profile/update-phone/{id}', [MainController::class, 'updatePhone'])->name('updatePhone');

                Route::get('/admin', [AdminController::class, 'showAdmin'])->name('admin');
                Route::delete('/admin/deleteUser', [AdminController::class, 'deleteUser'])->name('deleteUser');
                Route::patch('/admin/editUser', [AdminController::class, 'editUser'])->name('editUser');
                Route::post('/profile/updateDirectorName/{id}', [AdminController::class, 'updateDirectorName'])->name('updateDirectorName');
                Route::post('/profile/update-department/{id}', [AdminController::class, 'updateDepartment'])->name('updateDepartment');

                Route::get('/admin/addApplicationType', [AdminController::class, 'showAddApplicationType'])->name('showAddApplicationType');
                Route::post('/admin/addApplicationType', [AdminController::class, 'addApplicationType'])->name('addApplicationType');
                Route::delete('/admin/deleteApplicationType', [AdminController::class, 'deleteApplicationType'])->name('deleteApplicationType');
                Route::patch('/admin/editApplicationType', [AdminController::class, 'editApplicationType'])->name('editApplicationType');

                Route::get('/admin/showApplicationStatus', [AdminController::class, 'showApplicationStatus'])->name('showApplicationStatus');
                Route::post('/admin/addApplicationStatus', [AdminController::class, 'addApplicationStatus'])->name('addApplicationStatus');
                Route::delete('/admin/deleteApplicationStatus', [AdminController::class, 'deleteApplicationStatus'])->name('deleteApplicationStatus');
                Route::patch('/admin/editApplicationStatus', [AdminController::class, 'editApplicationStatus'])->name('editApplicationStatus');

                Route::get('/admin/usersList', [AdminController::class, 'showUsersList'])->name('usersList');
                Route::get('/admin/usersApplications', [AdminController::class, 'usersApplications'])->name('usersApplications');
                Route::delete('/admin/deleteUserApplication', [AdminController::class, 'deleteUserApplication'])->name('deleteUserApplication');
                Route::patch('/admin/editUserApplication', [AdminController::class, 'editUserApplication'])->name('editUserApplication');
        Route::get('/admin/dispatcherApplications', [AdminController::class, 'dispatcherApplications'])->name('dispatcherApplications');
        Route::post('/admin/addDispatcherApplication', [AdminController::class, 'addDispatcherApplication'])->name('addDispatcherApplication');
        Route::patch('/admin/editDispatcherApplication', [AdminController::class, 'editDispatcherApplication'])->name('editDispatcherApplication');
        Route::delete('/admin/deleteDispatcherApplication', [AdminController::class, 'deleteDispatcherApplication'])->name('deleteDispatcherApplication');


    });


