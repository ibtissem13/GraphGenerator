<?php


namespace App\Repositories\Eloquent;
use App\Models\Node;
use App\Repositories\NodeRepositoryInterface;
use Illuminate\Support\Collection;
class NodeRepository extends BaseRepository implements NodeRepositoryInterface
{
 /**
 * UserRepository constructor.
 *
 * @param User $model
 */
 public function __construct(Node $model)
 {
 parent::__construct($model);
 }
 /**
 * @return Collection
 */
 public function all(): Collection
 {
 return $this->model->all();
 }
 
 public function addNodesToGraph($nodes,$id){
	 for($i=0;$i<count($nodes);$i++){
				$nodeInput=$nodes[$i];
				$node=$this->model->find($nodeInput['id']);
				if($node==null){
				$node=new Node();	
				$node->id=$nodeInput['id'];
				$node->graph_id=$id;
				$node->save();
				}
			}
 }
 

}
