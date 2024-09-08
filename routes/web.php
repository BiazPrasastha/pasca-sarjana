<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Dashboard;
use App\Livewire\Judiciaries;
use App\Livewire\News;
use App\Livewire\Plagiarism;
use App\Livewire\Proposal;
use App\Livewire\StudentJudiciaries;
use App\Livewire\StudentPlagiarism;
use App\Livewire\StudentTheses;
use App\Livewire\Theses;
use App\Livewire\Announcement;
use App\Livewire\Payment;
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
    return view('home');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('auth.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('auth.logout');
    Route::get('dashboard', Dashboard\Index::class)->name('dashboard.index');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'can:user-admin'], function () {
        Route::group(['prefix' => 'proposal', 'as' => 'proposal.'], function () {
            Route::get('/', Proposal\Index::class)->name('index');
            Route::get('/{document}/verification', Proposal\Verification::class)->name('verification')->middleware(["can:file-type,document,'proposal'"]);
            Route::get('/{document}/schedule', Proposal\Schedule::class)->name('schedule')->middleware(["can:document-status,document,'accept'", "can:file-type,document,'proposal'"]);
        });

        Route::group(['prefix' => 'plagiarism', 'as' => 'plagiarism.'], function () {
            Route::get('/', Plagiarism\Index::class)->name('index');
            Route::get('/{document}/verification', Plagiarism\Verification::class)->name('verification')->middleware(["can:file-type,document,'plagiarism'"]);
            Route::get('/{file}/accept', Plagiarism\Accept::class)->name('accept')->middleware(["can:file-status,file,'pending|accept'", "can:file-type,file,'plagiarism'"]);
            Route::get('/{file}/decline', Plagiarism\Decline::class)->name('decline')->middleware(["can:file-status,file,'pending|decline'", "can:file-type,file,'plagiarism'"]);
        });

        Route::group(['prefix' => 'theses', 'as' => 'theses.'], function () {
            Route::get('/', Theses\Index::class)->name('index');
            Route::get('/{document}/verification', Theses\Verification::class)->name('verification')->middleware(["can:file-type,document,'theses'"]);
            Route::get('/{document}/schedule', Theses\Schedule::class)->name('schedule')->middleware(["can:document-status,document,'accept'", "can:file-type,document,'theses'"]);
        });

        Route::group(['prefix' => 'judiciaries', 'as' => 'judiciaries.'], function () {
            Route::get('/', Judiciaries\Index::class)->name('index');
            Route::get('/{document}/verification', Judiciaries\Verification::class)->name('verification')->middleware(["can:file-type,document,'judiciaries'"]);
            Route::get('/{file}/accept', Judiciaries\Accept::class)->name('accept')->middleware(["can:file-status,file,'pending|accept'", "can:file-type,file,'judiciaries'"]);
            Route::get('/{file}/decline', Judiciaries\Decline::class)->name('decline')->middleware(["can:file-status,file,'pending|decline'", "can:file-type,file,'judiciaries'"]);
        });

        Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
            Route::get('/', News\Index::class)->name('index');
            Route::get('/create', News\Create::class)->name('create');
            Route::get('/{news}/edit', News\Edit::class)->name('edit');
        });

        Route::group(['prefix' => 'announcement', 'as' => 'announcement.'], function () {
            Route::get('/', Announcement\Index::class)->name('index');
            Route::get('/create', Announcement\Create::class)->name('create');
            Route::get('/{announcement}/edit', Announcement\Edit::class)->name('edit');
        });
    });

    Route::group(['prefix' => 'student', 'as' => 'student.', 'can:user-student'], function () {
        Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
            Route::get('/', Payment\Index::class)->name('index');
            Route::get('/process', Payment\ProcessList::class)->name('process-list');
            Route::get('/confirm', Payment\ConfirmList::class)->name('confirm-list');
            Route::get('/process/{payment}', Payment\Process::class)->name('process')->middleware('process-payment');
            Route::get('/process/{payment}/detail', Payment\ProcessDetail::class)->name('process-detail');
            Route::get('/confirm/{payment}', Payment\Confirm::class)->name('confirm')->middleware('confirm-payment');
        });
        Route::group(['prefix' => 'theses', 'as' => 'theses.'], function () {
            Route::get('/', StudentTheses\Index::class)->name('index');
        });
        Route::group(['prefix' => 'plagiarism', 'as' => 'plagiarism.'], function () {
            Route::get('/', StudentPlagiarism\Index::class)->name('index');
        });
        Route::group(['prefix' => 'judiciaries', 'as' => 'judiciaries.'], function () {
            Route::get('/', StudentJudiciaries\Index::class)->name('index');
        });
    });
});
