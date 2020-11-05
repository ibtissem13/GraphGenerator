<?php


namespace App\Repositories\Eloquent;
//use App\Model\GraphValidator;
use App\Http\Requests;
use App\Models\Graph;
use App\Models\Node;
use App\Models\Relation;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\GraphRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Collection;
use Validator;
class GraphRepository extends BaseRepository implements GraphRepositoryInterface
{
 /**
 * UserRepository constructor.
 *
 * @param User $model
 */
 public function __construct(Graph $model)
 {
 parent::__construct($model);
 }
 /**
 * @return Collection
 */
 public function all(): Collection
 {
 return $this->model->all('name','description');
 }
 public function clearEmptyGraphs(){
	
	return $this->model::leftJoin('nodes', function($join) {
		  $join->on('graphs.id', '=', 'nodes.graph_id');
		})
		->whereNull('nodes.graph_id')->delete();
 }
 public function numberOfNodes($id): int{
	return $this->model->with('nodes')
				
				 ->where('id','=',$id)->count();
 }
 public function numberOfRelations($id):int{
	return Relation::join('nodes as parent','parent.id','parent_id')
				->join('nodes as child','child.id','child_id')
		->count();
 }
 public function getInfos($id):?Model{
	 return $this->model->where('id','=',$id)->first(['name', 'description']);;
 }
 public function getCreationValidationRules():array{
	 
	 


        return $this->model->getCreateRulesAttributes();
 }public function getUpdateValidationRules():array{
	 
	 


        return $this->model->getUpdateRulesAttributes();
 }
 public function update($id, $input) : int {
	 
		 $graph=$this->model->find($id);
		 if($graph!=null){
			$graph->name = $input['name'];
			if(array_key_exists('description',$input))
			$graph->description = $input['description'];
			$graph->save();
			return $graph->id;
		 }else{
			return -1;
		 }
		
 }
 public function addNodesToGraph($nodes,$id){
	 for($i=0;$i<count($nodes);$i++){
				$nodeInput=$nodes[$i];
				$node=Node::find($nodeInput['id']);
				if($node==null){
				$node=new Node();	
				$node->id=$nodeInput['id'];
				$node->graph_id=$id;
				$node->save();
				}
			}
 }
 public function addRelationsToGraph($relations){
	 for($i=0;$i<count($relations);$i++){
				$relationInput=$relations[$i];
				$relation=Relation::where('parent_id','=',$relationInput['parent_id'])
								->where('child_id','=',$relationInput['child_id'])->first();
				if($relation==null){
					$parent=Node::find($relationInput['parent_id']);
					$child=Node::find($relationInput['child_id']);
				if($parent!=null && $child!=null){
					if($parent->graph_id==$child->graph_id){
						$relation=new Relation();	
						$relation->parent_id=$relationInput['parent_id'];
						$relation->child_id=$relationInput['child_id'];
						$relation->save();
					}
				}
				}
 }
 }
 public function reshape($id,$nodes,$relations) : int {
	
		 $graph=$this->model->find($id);
		 if($graph!=null){
			$this->addNodesToGraph($nodes,$id);
			$this->addRelationsToGraph($relations);
				
			
			return 1;
		 }else{
			return -1;
		 }
		
 }
 public function get($id):? Collection
 {
	 return $this->model
				 ->with('nodes')

				 ->with('relashions')
				
				 ->where('id','=',$id)->get();
 }
 
	


}
