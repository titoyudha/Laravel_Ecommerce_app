<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use CategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        CategoryContract::class => CategoryRepository::class
    ];
    /**
     * Register services.
     */
    public function register()
    {
        //
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
