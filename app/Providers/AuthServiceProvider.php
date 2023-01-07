<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Rentage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });
        Gate::define('isUser', function ($user) {
            return $user->role == 'user';
        });

        // makes sure you view book details or review only books that you request
        Gate::define('viewRentage', function (User $user, Rentage $rentage) {
            return $user->id === $rentage->user_id;
        });
    }
}
