<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            // $view->with('archives', \App\Post::archives());
            // $view->with('tags', \App\Tag::has('posts')->pluck('name'));
            // OR
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            
            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Binding(/registering) to the service container
        // App::bind() or use app() like view() and request()
        // App::bind('App\Billing\Stripe', function() {
        //     return new \App\Billing\Stripe(config('services.stripe.secret'));
        // }); or...
        
        // $this->app->bind(Stripe::class, function() {
        //     return new Stripe(config('services.stripe.secret'));
        // });
    }
}
