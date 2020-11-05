<?php

namespace App\Http\Controllers\API;
use App\Repositories\RelationRepositoryInterface;

use Illuminate\Http\Request;

class RelationController extends BaseController
{
	private $relationRepository;

		 public function __construct(RelationRepositoryInterface $relationRepository)
		 {
		 $this->relationRepository = $relationRepository;
		 }
  
    /**
     * Add relation to a specific graph
     * @param  \Illuminate\Http\Request  $request : contains the relation nodes ids 
     * @return \Illuminate\Http\Response : success true or false and a message
     */
    public function store(Request $request)
    {
        //
		$input = $request->all();


       


        $node = $this->relationRepository->create($input);


        return $this->sendResponse([], 'Relation created successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
