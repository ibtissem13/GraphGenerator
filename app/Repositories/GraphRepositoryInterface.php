<?php

namespace App\Repositories;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

use Validator;

/**
* Interface GraphRepositoryInterface
* @package App\Repositories
*/
interface GraphRepositoryInterface 
{
			//public function validator(): FormRequest;

	/**
	* Get all graphs
	* @return Collection
	*/

     public function all(): Collection;
	 /**
	* update a graph
	* @return Model
	*/

	public function update($id, $input) :int;
	public function reshape($id,$nodes,$relations) :int;
	
	public function get($id) :? Collection;
	public function clearEmptyGraphs();
	public function numberOfNodes($id): int;
	public function numberOfRelations($id):int;
	public function getInfos($id):?Model; 
}
