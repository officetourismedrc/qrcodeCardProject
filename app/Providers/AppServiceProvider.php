<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Card;
use App\Models\Employee;
use App\Models\User;
use App\Models\Role;

use App\Policies\RolePolicy;
use App\Policies\CardPolicy;
use App\Policies\EmployeePolicy;
use App\Policies\UserPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Card::class, CardPolicy::class);
        Gate::policy(Employee::class, EmployeePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
    }
}
