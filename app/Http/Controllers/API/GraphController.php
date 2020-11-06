<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Repositories\GraphRepositoryInterface;
use Illuminate\Http\Request;
 use Validator;



class GraphController extends BaseController
{
    
	 private $graphRepository;
	 private $relationRepository;

		 public function __construct(GraphRepositoryInterface $graphRepository)
		 {
		 $this->graphRepository = $graphRepository;
		 }
	/**
     * Get all graphs (only meta data).
     *
     * @response  with
	 * success true or false,the data  requested and a message 
     */
    public function index()
    {
        //
		//dd($this->graphRepository);
				$graphs = $this->graphRepository->all();
			        return $this->sendResponse($graphs->toArray(), 'Graphs retrieved successfully.');

    }

    

    /**
     * Create an empty graph.
     *
     * @param  \Illuminate\Http\Request  $request contains the graph meta data 
     * @return \Illuminate\Http\Response : success true or false, a message and if an error if the validation fails 
     */
    public function store(Request $request)
    {
       $input = $request->all();

		$rules = $this->graphRepository->getCreationValidationRules();

		$validator = Validator::make($input, $rules);



        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
       


        $graph = $this->graphRepository->create($input);


        return $this->sendResponse([], 'Graph created successfully.');
    }

    /**
     * Get single graph with its nodes and relations;
     *
     * @param  $id : the graph's id 
     * @return \Illuminate\Http\Response return  success true or false, a message and data witch contains the graph infos requested
     */
    public function show($id)
    {
        //
		$graph = $this->graphRepository->get($id);


        return $this->sendResponse($graph, 'Graph retrieved successfully.');
   
    }

   
    /**
     * Edit graph meta data (name, description).
     *
     * @param  \Illuminate\Http\Request  $request : contains the graph's meta data to edit
     * @param  $id : graph's id 
     * @return \Illuminate\Http\Response : success true or false, a message and if an error if the validation fails 
     */
    public function update(Request $request, $id)
    {
        //
		 $input = $request->all();
		 $rules = $this->graphRepository->getCreationValidationRules();

		 $validator = Validator::make($input, $rules);




         if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
         }
        
		

        
			

      
		 $graph = $this->graphRepository->update($id,$input);
			

         return $this->sendResponse([], 'Graph updated successfully.');
    

   
    }
	 /**
     * 	Update the graph shape (all nodes and relations
     *
     * @param  \Illuminate\Http\Request  $request : contains the graph's nodes and relashions. nodes : array of nodes , relashions : array of relations
     * @param  $id : graph's id 
     * @return \Illuminate\Http\Response : success true or false, a message and if an error if the validation fails 
     */
	public function reshape(Request $request, $id)
    {
        //
		$input = $request->all();
		

     
      
		
		$nodes=json_decode($input['nodes'],true);
		$relations=json_decode($input['relations'],true);
		
		$graphReshap = $this->graphRepository->reshape($id,$nodes,$relations);
		if($graphReshap==1)
			return $this->sendResponse([], 'Graph updated successfully.');
		else
			return $this->sendError('Error, graph doesn\'t exist', '');

   
    }

    /**
     * Delete graph 
	 
     * @param $id : the graph's id
     * @return \Illuminate\Http\Response success true or false, a message and if an error if the graph doesn't exist 
     */
    public function destroy( $id)
    {
        //
		$indicator=$this->graphRepository->delete($id);
		if($indicator==1)
			return $this->sendResponse([], 'Graph deleted successfully.');
		else
			return $this->sendError('Error. Graph doesn\'t exist', "");       

    }
}
