<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface RelationRepositoryInterface
* @package App\Repositories
*/
interface RelationRepositoryInterface 
{
	/**
	* @return Collection
	*/
     public function all(): Collection;
	 public function addRelationsToGraph($relations);
	 public function create(array $attributes): ?Model;
}
