<?php
namespace App\Providers;

use App\Repositories\TransactionRepository;
use App\Repositories\TransactionRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionRepository::class,TransactionRepositoryEloquent::class);
    }
}
