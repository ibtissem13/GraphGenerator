<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface NodeRepositoryInterface
* @package App\Repositories
*/
interface NodeRepositoryInterface 
{
	/**
	* @return Collection
	*/
     public function all(): Collection;
public function addNodesToGraph($nodes,$id);
}
