<?php

namespace App\Repositories\Eloquent;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class BaseRepository implements BaseRepositoryInterface
{
 /**
 * @var Model
 */
 protected $model;
 /**
 * BaseRepository constructor.
 *
 * @param Model $model
 */
public function __construct(Model $model)
 {
 $this->model = $model;
 }
 /**
 * @param array $attributes
 *
 * @return Model
 */
 public function create(array $attributes): ?Model
 {
 return $this->model->create($attributes);
 }
 /**
 * @param $id
 * @return Model
 */
 public function find($id): ?Model
 {
 return $this->model->find($id);
 }
  public function delete($id) : int {

	$model=$this->find($id);
	if($model!=null){
		$model->delete();
		return 1;
	}else{
		return -1;
	}
  }
  public function getCreationValidationRules():array{

        return $this->model->createRules;
 }
 public function getUpdateValidationRules($id):array{
		
        return $this->model->getUpdateRules($id);
 }
 
} 

