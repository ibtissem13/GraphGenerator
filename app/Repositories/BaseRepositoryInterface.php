<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
/**
* Interface BaseRepositoryInterface
* @package App\Repositories
*/
interface BaseRepositoryInterface
{
    
 /**
 * @param array $attributes
 * @return Model
 */
 public function create(array $attributes): Model;
 /**
 * @param $id
 * @return Model
 */
 public function find($id): ?Model;
	public function delete($id) :int;


}
