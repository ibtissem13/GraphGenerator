<?php


namespace App\Repositories\Eloquent;
use App\Models\Relation;
use App\Repositories\RelationRepositoryInterface;
use App\Repositories\NodeRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class RelationRepository extends BaseRepository implements RelationRepositoryInterface
{
 /**
 * UserRepository constructor.
 *
 * @param User $model
 */
 private $nodeRepository;
 public function __construct(Relation $model,NodeRepositoryInterface $nodeRepository)
 {
		parent::__construct($model);
		$this->nodeRepository=$nodeRepository;
 
 }
 /**
 * @return Collection
 */
 public function all(): Collection
 {
 return $this->model->all();
 }
 public function create(array $attributes):? Model
 {
			$parent=$this->nodeRepository->find($attributes['parent_id']);
			$child=$this->nodeRepository->find($attributes['child_id']);
			if($parent!=null && $child!=null){
					if($parent->graph_id==$child->graph_id){
					
						return $this->model->create($attributes);
					}
			}
	return null;

 }
public function addRelationsToGraph($relations){
	 for($i=0;$i<count($relations);$i++){
				$relationInput=$relations[$i];
				$relation=Relation::where('parent_id','=',$relationInput['parent_id'])
								->where('child_id','=',$relationInput['child_id'])->first();
				if($relation==null){
					$parent=$this->nodeRepository->find($relationInput['parent_id']);
					$child=$this->nodeRepository->find($relationInput['child_id']);
				if($parent!=null && $child!=null){
					if($parent->graph_id==$child->graph_id){
						$this->model->create($relationInput);
					}
				}
				}
 }
 }
}
