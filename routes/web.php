<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamPinkController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventPageController;
use App\Http\Controllers\EventBookingPhaseController;
use App\Http\Controllers\EventBookingStageController;
use App\Http\Controllers\EventBookingStageFieldController;

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
    return view('welcome');
})->name('home');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/user/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::post('/user/edit', [UserController::class, 'update'])->middleware('auth');
Route::get('/user/delete', [UserController::class, 'confirmDelete'])->name('users.delete')->middleware('auth');
Route::post('/user/delete', [UserController::class, 'delete'])->middleware('auth');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'delete'])->name('logout')->middleware('auth');


Route::prefix('/clubs')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::middleware('permission:team_pink')->group(function () {
            Route::get('/create', [ClubController::class, 'create'])->name('clubs.create');
            Route::post('/create', [ClubController::class, 'store']);
        });

        Route::middleware('permission:club')->group(function () {
            Route::get('/{id}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
            Route::post('/{id}/edit', [ClubController::class, 'update']);
            Route::get('/{id}/delete', [ClubController::class, 'destroy'])->name('clubs.delete');
        });
        
        Route::get('{id}/join', [MembershipController::class, 'joinConfirm'])->name('clubs.join');
        Route::post('{id}/join', [MembershipController::class, 'join']);
        Route::get('{id}/members', [MembershipController::class, 'clubList'])->name('clubs.members');
    });

    Route::get('/', [ClubController::class, 'index'])->name('clubs.index');
    Route::get('/{id}', [ClubController::class, 'show'])->name('clubs.show');

    Route::get('{id}/committee', [CommitteeController::class, 'showClubCommittee'])->name('clubs.committee');
});

Route::prefix('/committees/{committeeId}')->group(function () {
    //potentially change permissions using both allows for assistants to be set but also gives exec power over club committees
    Route::middleware(['auth', 'permission:on_committee, exec'])->group(function () {
        Route::post('/roles/add', [CommitteeController::class, 'addRole'])->name('committees.addrole');
        Route::get('/roles/{roleId}/remove', [CommitteeController::class, 'removeRole'])->name('committees.removerole');

        Route::get('/roles/{roleId}/member', [RoleController::class, 'setUserForm'])->name('committees.setrole');
        Route::post('/roles/{roleId}/member', [RoleController::class, 'setUser'])->name('committees.setrolepost');

        Route::get('/roles/{roleId}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/roles/{roleId}/edit', [RoleController::class, 'update']);
    });
});

Route::prefix('/team-pink')->group(function () {
    Route::middleware(['auth', 'permission:team_pink'])->group(function () {
        Route::get('/', [TeamPinkController::class, 'index'])->name('team-pink');
    });
});

Route::prefix('/events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::middleware('auth')->group(function () {
        Route::get('/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/create', [EventController::class, 'store'])->name('events.store');
    });
    Route::get('/{eventId}', [EventController::class, 'show'])->name('events.show');
    Route::middleware('permission:event')->group(function () {
        Route::get('/{eventId}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::post('/{eventId}/edit', [EventController::class, 'update'])->name('events.update');
        Route::get('/{eventId}/delete', [EventController::class, 'destroy'])->name('events.delete');

        Route::get('/{eventId}/pages', [EventPageController::class, 'index'])->name('event-pages.index');
        Route::get('/{eventId}/pages/create', [EventPageController::class, 'create'])->name('event-pages.create');
        Route::post('/{eventId}/pages/create', [EventPageController::class, 'store'])->name('event-pages.store');
        Route::get('/{eventId}/pages/{eventPageId}/edit', [EventPageController::class, 'edit'])->name('event-pages.edit');
        Route::post('/{eventId}/pages/{eventPageId}/edit', [EventPageController::class, 'update'])->name('event-pages.update');
        Route::get('/{eventId}/pages/{eventPageId}/delete', [EventPageController::class, 'destroy'])->name('event-pages.delete');

        Route::get('/{eventId}/phases/create', [EventBookingPhaseController::class, 'create'])->name('event-booking-phases.create');
        Route::post('/{eventId}/phases/create', [EventBookingPhaseController::class, 'store'])->name('event-booking-phases.store');
        Route::get('/{eventId}/phases/{eventBookingPhaseId}/edit', [EventBookingPhaseController::class, 'edit'])->name('event-booking-phases.edit');
        Route::post('/{eventId}/phases/{eventBookingPhaseId}/edit', [EventBookingPhaseController::class, 'update'])->name('event-booking-phases.update');
        Route::get('/{eventId}/phases/{eventBookingPhaseId}/delete', [EventBookingPhaseController::class, 'destroy'])->name('event-booking-phases.delete');

        Route::get('/{eventId}/stages/create', [EventBookingStageController::class, 'create'])->name('event-booking-stages.create');
        Route::post('/{eventId}/stages/create', [EventBookingStageController::class, 'store'])->name('event-booking-stages.store');
        Route::get('/{eventId}/stages/{eventBookingStageId}/edit', [EventBookingStageController::class, 'edit'])->name('event-booking-stages.edit');
        Route::post('/{eventId}/stages/{eventBookingStageId}/edit', [EventBookingStageController::class, 'update'])->name('event-booking-stages.update');
        Route::get('/{eventId}/stages/{eventBookingStageId}/show', [EventBookingStageController::class, 'show'])->name('event-booking-stages.show');
        Route::get('/{eventId}/stages/{eventBookingStageId}/delete', [EventBookingStageController::class, 'destroy'])->name('event-booking-stages.delete');

        Route::post('/{eventId}/stages/{eventBookingStageId}/fields/create', [EventBookingStageFieldController::class, 'store'])->name('event-booking-stage-fields.store');
        Route::get('/{eventId}/stages/{eventBookingStageId}/fields/{eventBookingStageFieldId}/delete', [EventBookingStageFieldController::class, 'destroy'])->name('event-booking-stage-fields.delete');
    });
    Route::get('/{eventId}/pages/{eventPageId}', [EventPageController::class, 'show'])->name('event-pages.show');
    Route::get('{id}/committee', [CommitteeController::class, 'showEventCommittee'])->name('events.committee');
});