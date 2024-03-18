<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Judiciaries\Accept as JudiciariesAccept;
use App\Livewire\Judiciaries\Decline as JudiciariesDecline;
use App\Livewire\Judiciaries\Index as JudiciariesIndex;
use App\Livewire\Judiciaries\Verification as JudiciariesVerification;
use App\Livewire\News\Index as NewsIndex;
use App\Livewire\Plagiarism\Accept as PlagiarismAccept;
use App\Livewire\Plagiarism\Decline as PlagiarismDecline;
use App\Livewire\Plagiarism\Index as PlagiarismIndex;
use App\Livewire\Plagiarism\Verification as PlagiarismVerification;
use App\Livewire\Proposal\Index as ProposalIndex;
use App\Livewire\Proposal\Schedule as ProposalSchedule;
use App\Livewire\Proposal\Verification as ProposalVerification;
use App\Livewire\Theses\Index as ThesesIndex;
use App\Livewire\Theses\Schedule as ThesesSchedule;
use App\Livewire\Theses\Verification as ThesesVerification;
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

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('auth.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('auth.logout');
    Route::get('dashboard', DashboardIndex::class)->name('dashboard.index');

    Route::group(['prefix' => 'proposal', 'as' => 'proposal.'], function () {
        Route::get('/', ProposalIndex::class)->name('index');
        Route::get('/{document}/verification', ProposalVerification::class)->name('verification')->middleware(['can:user-admin', "can:file-type,document,'proposal'"]);
        Route::get('/{document}/schedule', ProposalSchedule::class)->name('schedule')->middleware(['can:user-admin', "can:document-status,document,'accept'", "can:file-type,document,'proposal'"]);
    });

    Route::group(['prefix' => 'plagiarism', 'as' => 'plagiarism.'], function () {
        Route::get('/', PlagiarismIndex::class)->name('index');
        Route::get('/{document}/verification', PlagiarismVerification::class)->name('verification')->middleware(['can:user-admin', "can:file-type,document,'plagiarism'"]);
        Route::get('/{file}/accept', PlagiarismAccept::class)->name('accept')->middleware(['can:user-admin', "can:file-status,file,'pending|accept'", "can:file-type,file,'plagiarism'"]);
        Route::get('/{file}/decline', PlagiarismDecline::class)->name('decline')->middleware(['can:user-admin', "can:file-status,file,'pending|decline'", "can:file-type,file,'plagiarism'"]);
    });

    Route::group(['prefix' => 'theses', 'as' => 'theses.'], function () {
        Route::get('/', ThesesIndex::class)->name('index');
        Route::get('/{document}/verification', ThesesVerification::class)->name('verification')->middleware(['can:user-admin', "can:file-type,document,'theses'"]);
        Route::get('/{document}/schedule', ThesesSchedule::class)->name('schedule')->middleware(['can:user-admin', "can:document-status,document,'accept'", "can:file-type,document,'theses'"]);
    });

    Route::group(['prefix' => 'judiciaries', 'as' => 'judiciaries.'], function () {
        Route::get('/', JudiciariesIndex::class)->name('index');
        Route::get('/{document}/verification', JudiciariesVerification::class)->name('verification')->middleware(['can:user-admin', "can:file-type,document,'judiciaries'"]);
        Route::get('/{file}/accept', JudiciariesAccept::class)->name('accept')->middleware(['can:user-admin', "can:file-status,file,'pending|accept'", "can:file-type,file,'judiciaries'"]);
        Route::get('/{file}/decline', JudiciariesDecline::class)->name('decline')->middleware(['can:user-admin', "can:file-status,file,'pending|decline'", "can:file-type,file,'judiciaries'"]);
    });

    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
        Route::get('/', NewsIndex::class)->name('index');
    });
});
