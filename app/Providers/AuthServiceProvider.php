<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Logic\PermissionHelper;
use App\Models\Dataset;
use App\Models\User;
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

//        Gate::before(function (User $user, string $ability) {
//            if($user->hasPermissionTo(PermissionHelper::PERMISSION_ADMIN_PERMISSIONS)){
//                return true;
//            }
//
//        });

        Gate::define(PermissionHelper::PERMISSION_MANAGE_SCENARIOS, function (User $user) {
            return $user->hasPermissionTo(PermissionHelper::PERMISSION_MANAGE_SCENARIOS);
        });

        Gate::define(PermissionHelper::PERMISSION_UPLOAD_DATASETS, function (User $user) {
            return $user->hasPermissionTo(PermissionHelper::PERMISSION_UPLOAD_DATASETS);
        });

        Gate::define(PermissionHelper::PERMISSION_ADMIN_PERMISSIONS, function (User $user) {
            return $user->hasPermissionTo(PermissionHelper::PERMISSION_ADMIN_PERMISSIONS);
        });

    }
}
