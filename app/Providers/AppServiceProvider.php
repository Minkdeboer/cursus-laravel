<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Posting;
use App\Models\User;
use App\Observers\PostingObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind('first_class', function ($app) {
            dd ("Dit is mijn eerste service class");
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::define('update-post', function(User $user, Post $post){
            
        // });

        Posting::observe(PostingObserver::class);
    }
}
