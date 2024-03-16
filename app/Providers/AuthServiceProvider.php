<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\DocumentPolicy;
use App\Policies\FilePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // user role
        Gate::define('user-admin', [UserPolicy::class, 'admin']);
        Gate::define('user-lecturer', [UserPolicy::class, 'lecturer']);
        Gate::define('user-student', [UserPolicy::class, 'student']);

        // document
        Gate::define('document-status', [DocumentPolicy::class, 'status']);

        // file
        Gate::define('file-status', [FilePolicy::class, 'status']);
        Gate::define('file-type', [FilePolicy::class, 'type']);
    }
}
