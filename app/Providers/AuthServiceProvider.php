<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // App\Models\IncidentPost::class=>App\Policies\IncidentPostPolicy::class,
        'App\Models\IncidentPost' => 'App\Policies\IncidentPostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //ユーザー情報一覧に権限を付与
        Gate::define('admin',function($user) {
            foreach($user->roles as $role) {
                if($role->name == 'admin') {
                    return true;
                }
            }
            return false;
        });
    }
}
