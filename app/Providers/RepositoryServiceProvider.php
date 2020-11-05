<?php

namespace App\Providers;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\GraphRepositoryInterface;
use App\Repositories\NodeRepositoryInterface;
use App\Repositories\RelationRepositoryInterface;
use App\Repositories\Eloquent\GraphRepository;
use App\Repositories\Eloquent\BaseRepository; 
use App\Repositories\Eloquent\NodeRepository; 
use App\Repositories\Eloquent\RelationRepository; 
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
		$this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
		$this->app->bind(GraphRepositoryInterface::class, GraphRepository::class);
		$this->app->bind(NodeRepositoryInterface::class, NodeRepository::class);
		$this->app->bind(RelationRepositoryInterface::class, RelationRepository::class);
			}

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
