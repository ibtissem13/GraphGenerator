<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		    \App\Models\Node::factory( 10)->create();

    }
}
