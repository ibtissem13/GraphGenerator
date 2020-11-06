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
use App\Repositories\RelationRepositoryInterface;
use App\Repositories\NodeRepositoryInterface;

use Illuminate\Support\Collection;
use Validator;
class GraphRepository extends BaseRepository implements GraphRepositoryInterface
{
 /**
 * UserRepository constructor.
 *
 * @param User $model
 */
 private $relationRepository;
 private $nodeRepository;
 public function __construct(Graph $model,RelationRepositoryInterface $relationRepository,NodeRepositoryInterface $nodeRepository)
 {
 parent::__construct($model);
 $this->relationRepository=$relationRepository;
 $this->nodeRepository=$nodeRepository;
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
 
 
 public function reshape($id,$nodes,$relations) : int {
	
		 $graph=$this->model->find($id);
		 if($graph!=null){
			$this->nodeRepository->addNodesToGraph($nodes,$id);
			$this->relationRepository->addRelationsToGraph($relations);
				
			
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
