<?php

namespace Database\Factories;

use App\Models\Relation;
use Illuminate\Database\Eloquent\Factories\Factory;

class RelationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Relation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
			        'parent_id'       => \App\Models\Node::factory(),
			        'child_id'       => \App\Models\Node::factory(),
					      //  'parent_id' => $faker->randomElement($users),


        ];
    }
}
