<?php

namespace App\Http\Controllers\API;
use App\Repositories\NodeRepositoryInterface;
use Illuminate\Http\Request;
use Validator;
class NodeController extends BaseController
{
	 private $nodeRepository;

		 public function __construct(NodeRepositoryInterface $nodeRepository)
		 {
		 $this->nodeRepository = $nodeRepository;
		 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Add node to a specific graph.
     *
     * @param  \Illuminate\Http\Request  $request : graph parent id
     * @return \Illuminate\Http\Response  :success true or false, a message  

     */
    public function store(Request $request)
    {
        //
		$input = $request->all();
		$rules = $this->nodeRepository->getCreationValidationRules();

		$validator = Validator::make($input, $rules);



        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
       

       


        $node = $this->nodeRepository->create($input);


        return $this->sendResponse([], 'Node created successfully.');
  
		
    }

    
    /**
     * Delete a specific node
     *
     * @param  $id : node id 
     * @return \Illuminate\Http\Response :success true or false, a message  and an error in case the node doesn't exist 
     */
    public function destroy($id)
    {
        //
		  //
		$indicator=$this->nodeRepository->delete($id);
		if($indicator==1)
			return $this->sendResponse([], 'Node deleted successfully.');
		else
			return $this->sendError('Validation Error. Node doesn\'t exist', "");       

    }
}
