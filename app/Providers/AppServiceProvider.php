<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Observers\UserObserver;
use App\Models\clients;
use App\Models\MatrixCategory;
use App\Models\MatrixFunction;
use App\Observers\ClientObserver;
use App\Models\Members;
use App\Models\EstateDetail;
use App\Observers\EstateObserver;
use App\Observers\MembersObserver;
use App\Observers\FunctionObserver;
use App\Observers\ServiceObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        clients::observe(ClientObserver::class);
        Members::observe(MembersObserver::class);
        MatrixFunction::observe(FunctionObserver::class);
        MatrixCategory::observe(ServiceObserver::class);
        EstateDetail::observe(EstateObserver::class);
    }
}
