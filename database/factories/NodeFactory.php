<?php

namespace Database\Factories;

use App\Models\Node;
use App\Models\Graph;
use Illuminate\Database\Eloquent\Factories\Factory;

class NodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Node::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
		   // $graphs = App\Graph::pluck('id')->toArray();

        return [
			        'graph_id'       => \App\Models\Graph::factory(),
					      //  'parent_id' => $faker->randomElement($users),


        ];
    
	}
}
