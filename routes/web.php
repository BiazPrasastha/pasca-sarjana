<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Plagiarism\Accept as PlagiarismAccept;
use App\Livewire\Plagiarism\Decline as PlagiarismDecline;
use App\Livewire\Plagiarism\Index as PlagiarismIndex;
use App\Livewire\Plagiarism\Verification as PlagiarismVerification;
use App\Livewire\Proposal\Index as ProposalIndex;
use App\Livewire\Proposal\Schedule as ProposalSchedule;
use App\Livewire\Proposal\Verification as ProposalVerification;
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
    Route::get('proposal', ProposalIndex::class)->name('proposal.index');
    Route::get('proposal/{document}/verification', ProposalVerification::class)->name('proposal.verification')->middleware('can:user-admin'); //middleware file type proposal
    Route::get('proposal/{document}/schedule', ProposalSchedule::class)->name('proposal.schedule')->middleware(['can:user-admin', 'can:file-pending,document']);
    Route::get('plagiarism', PlagiarismIndex::class)->name('plagiarism.index');
    Route::get('plagiarism/{document}/verification', PlagiarismVerification::class)->name('plagiarism.verification');
    Route::get('plagiarism/{document}/accept', PlagiarismAccept::class)->name('plagiarism.accept')->middleware(['can:user-admin', 'can:file-pending,document']);
    Route::get('plagiarism/{document}/decline', PlagiarismDecline::class)->name('plagiarism.decline')->middleware(['can:user-admin', 'can:file-pending,document']);
});
